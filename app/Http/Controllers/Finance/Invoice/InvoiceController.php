<?php

namespace App\Http\Controllers\Finance\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice; // Ensure you have an Invoice model
use App\Models\Client;  // Import Client model
use App\Models\Project; // Import Project model
use App\Models\Bank;    // Import Bank model
use Carbon\Carbon;
use App\Models\InvoiceItem;

use Dompdf\Dompdf; // For PDF generation
use Illuminate\Support\Facades\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        // Fetch all invoices from the database with related client, project, and bank
        $invoices = Invoice::with('client', 'project', 'bank')->get();

        // Pass the invoices to the view
        return view('finance.invoice.all-invoice', compact('invoices'));
    }

    public function viewInvoice($id)
    {
        // Fetch the invoice by ID along with its related client, project, bank, and items
        $invoice = Invoice::with(['client', 'project', 'bank', 'items'])->findOrFail($id);

        // Pass the invoice data to the view
        return view('finance.invoice.pdf-invoice', compact('invoice'));
    }

    public function add()
    {
        // Fetch clients, projects, and banks for the dropdowns
        $clients = Client::all();
        $projects = Project::all();
        $banks = Bank::all();

        // Pass the data to the view
        return view('finance.invoice.add-invoice', compact('clients', 'projects', 'banks'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'invoice_number' => 'required|string|max:255',
            'date' => 'required|date_format:d-m-Y',  // Assuming the format is day-month-year
            'due_date' => 'required|date_format:d-m-Y',  // Same format
            'currency' => 'required|string|max:3',
            'client_id' => 'required|integer|exists:clients,id',
            'project_id' => 'required|integer|exists:projects,id',
            'bank_id' => 'required|integer|exists:banks,id',
            'thank_you_note' => 'nullable|string',
            'signature' => 'nullable|string',
            'paid_amount' => 'nullable|boolean',
            'service.*' => 'required|string',
            'price.*' => 'required|numeric',
            'description.*' => 'required|string',
        ]);

        // Convert the dates from 'd-m-Y' to 'Y-m-d'
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');
        $dueDate = Carbon::createFromFormat('d-m-Y', $request->input('due_date'))->format('Y-m-d');

        // Create a new invoice
        $invoice = Invoice::create([
            'invoice_number' => $request->input('invoice_number'),
            'date' => $date,
            'due_date' => $dueDate,
            'currency' => $request->input('currency'),
            'client_id' => $request->input('client_id'),
            'project_id' => $request->input('project_id'),
            'bank_id' => $request->input('bank_id'),
            'thank_you_note' => $request->input('thank_you_note'),
            'signature' => $request->input('signature'),
            'paid_amount' => $request->has('paid_amount'),
        ]);

        // Store Invoice Items
        $services = $request->input('service', []);
        $prices = $request->input('price', []);
        $descriptions = $request->input('description', []);

        foreach ($services as $index => $service) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'service' => $service,
                'price' => $prices[$index],
                'description' => $descriptions[$index],
            ]);
        }

        // Redirect back to the invoices list with a success message
        return redirect()->route('finance.invoice.all-invoice')->with('success', 'Invoice created successfully.');
    }

    public function edit($id)
    {
        // Fetch the invoice and related data for editing
        $invoice = Invoice::findOrFail($id);
        $clients = Client::all();
        $projects = Project::all();
        $banks = Bank::all();

        // Pass the invoice and other data to the view
        return view('finance.invoice.edit-invoice', compact('invoice', 'clients', 'projects', 'banks'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'invoice_number' => 'required|string|max:255',
            'date' => 'required|date_format:d-m-Y',
            'due_date' => 'required|date_format:d-m-Y',
            'currency' => 'required|string|max:3',
            'client_id' => 'required|integer|exists:clients,id',
            'project_id' => 'required|integer|exists:projects,id',
            'bank_id' => 'required|integer|exists:banks,id',
            'thank_you_note' => 'nullable|string',
            'signature' => 'nullable|string',
            'service.*' => 'required|string',
            'price.*' => 'required|numeric',
            'description.*' => 'required|string',
            'service_id.*' => 'nullable|integer|exists:invoice_items,id',
        ]);

        // Format the date fields
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');
        $dueDate = Carbon::createFromFormat('d-m-Y', $request->input('due_date'))->format('Y-m-d');

        // Find the invoice and update it
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'invoice_number' => $request->input('invoice_number'),
            'date' => $date,
            'due_date' => $dueDate,
            'currency' => $request->input('currency'),
            'client_id' => $request->input('client_id'),
            'project_id' => $request->input('project_id'),
            'bank_id' => $request->input('bank_id'),
            'thank_you_note' => $request->input('thank_you_note'),
            'signature' => $request->input('signature'),
        ]);

        // Handle service updates, additions, and deletions
        $existingServices = $request->input('service_id', []);
        $services = $request->input('service', []);
        $prices = $request->input('price', []);
        $descriptions = $request->input('description', []);

        // Get all the current services for the invoice
        $invoiceItems = $invoice->items->pluck('id')->toArray();

        foreach ($services as $index => $service) {
            $serviceId = $existingServices[$index] ?? null;

            if ($serviceId && in_array($serviceId, $invoiceItems)) {
                // Update existing service
                $invoiceItem = InvoiceItem::find($serviceId);
                $invoiceItem->update([
                    'service' => $service,
                    'price' => $prices[$index],
                    'description' => $descriptions[$index],
                ]);
                $invoiceItems = array_diff($invoiceItems, [$serviceId]);
            } else {
                // Create new service
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'service' => $service,
                    'price' => $prices[$index],
                    'description' => $descriptions[$index],
                ]);
            }
        }

        // Delete services that are no longer part of the request
        if (!empty($invoiceItems)) {
            InvoiceItem::destroy($invoiceItems);
        }

        // Redirect back to the invoices list with a success message
        return redirect()->route('finance.invoice.all-invoice')->with('success', 'Invoice updated successfully.');
    }

    public function destroy($id)
    {
        // Find the invoice and delete it
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        // Redirect back to the invoices list with a success message
        return redirect()->route('finance.invoice.all-invoice')->with('success', 'Invoice deleted successfully.');
    }

    public function view()
    {
        // Fetch invoices for the logged-in client with related client, project, and bank details
        $invoices = Invoice::with('client', 'project', 'bank')
            ->where('client_id', 1)
            ->get();

        // Pass the invoices to the view
        return view('client-dash.invoice.all-invoice', compact('invoices'));
    }

    public function exportPdf()
    {
        $invoices = Invoice::with('client', 'project', 'bank')->get();
        $dompdf = new Dompdf();
        $html = view('finance.invoice.pdf-invoice-report', compact('invoices'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('invoice-report.pdf', ['Attachment' => true]);
    }

    public function exportExcel()
    {
        $invoices = Invoice::with('client', 'project', 'bank')->get();
        $fileName = 'invoice-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($invoices) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Invoice Number', 'Date', 'Due Date', 'Client', 'Project', 'Status']);

            foreach ($invoices as $invoice) {
                fputcsv($file, [
                    $invoice->invoice_number,
                    Carbon::parse($invoice->date)->format('d M Y'),
                    Carbon::parse($invoice->due_date)->format('d M Y'),
                    $invoice->client->name,
                    $invoice->project->project_name,
                    $invoice->paid_amount ? 'Paid' : 'Unpaid',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function apiClientInvoices()
    {
        // Hardcode client ID for testing purposes
        $clientId = 2; // Replace 1 with the dynamic client ID if needed in the future

        // Fetch invoices that belong to the client
        $invoices = Invoice::with('client', 'project', 'bank')
            ->where('client_id', $clientId)
            ->get();

        return response()->json($invoices);
    }
}
