<?php

namespace App\Http\Controllers\Quotation;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf; // For PDF generation
use Illuminate\Support\Facades\Response; // For Excel export
use Illuminate\Support\Facades\Auth; // For fetching client-specific quotations

class QuotationController extends Controller
{
    // Display all quotations
    public function view()
    {
        $quotations = Quotation::paginate(10); // Adjust the number of items per page as needed
        return view('client-dash.quotation.all-quotation', compact('quotations'));
    }

    // Show form to add a new quotation
    public function create()
    {
        return view('client-dash.quotation.add-quotation');
    }

    // Store a new quotation
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'type' => 'required|string|in:software,cyber,social',
            'sub_type' => 'required|string|in:web,app',
            'number_of_screens' => 'nullable|numeric|required_if:sub_type,app',
            'number_of_pages' => 'nullable|numeric|required_if:sub_type,web',
            'design_category' => 'required|string|in:normal,best,animation',
        ]);

        // Create a new quotation
        Quotation::create($validatedData);

        // Redirect to the quotation list with a success message
        return redirect()->route('client-dash.quotation.all-quotation')->with('success', 'Quotation added successfully!');
    }

    // Show the form to edit a quotation
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('client-dash.quotation.edit-quotation', compact('quotation'));
    }

    // Update a quotation
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'type' => 'required|string|in:software,cyber,social',
            'sub_type' => 'required|string|in:web,app',
            'number_of_screens' => 'nullable|numeric|required_if:sub_type,app',
            'number_of_pages' => 'nullable|numeric|required_if:sub_type,web',
            'design_category' => 'required|string|in:normal,best,animation',
        ]);

        // Find the quotation by ID and update it
        $quotation = Quotation::findOrFail($id);
        $quotation->update($validatedData);

        // Redirect with a success message
        return redirect()->route('client-dash.quotation.all-quotation')->with('success', 'Quotation updated successfully!');
    }

    // Delete a quotation
    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('client-dash.quotation.all-quotation')->with('success', 'Quotation deleted successfully!');
    }

    // Export quotations to PDF
    public function exportPdf()
    {
        $quotations = Quotation::all(); // Fetch all quotations
        $dompdf = new Dompdf();
        $html = view('client-dash.quotation.pdf-quotation-report', compact('quotations'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('quotation-report.pdf', ['Attachment' => true]);
    }

    // Export quotations to Excel (CSV)
    public function exportExcel()
    {
        $quotations = Quotation::all();
        $fileName = 'quotation-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($quotations) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Project Name', 'Type', 'Sub-Type', 'Screens/Pages', 'Design Category', 'Created Date']);

            foreach ($quotations as $quotation) {
                $screensOrPages = $quotation->sub_type === 'app' ? $quotation->number_of_screens . ' Screens' : $quotation->number_of_pages . ' Pages';
                fputcsv($file, [
                    $quotation->project_name,
                    ucfirst($quotation->type),
                    ucfirst($quotation->sub_type),
                    $screensOrPages,
                    ucfirst($quotation->design_category),
                    Carbon::parse($quotation->created_at)->format('d M Y'),
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
