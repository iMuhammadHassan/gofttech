<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all(); // Retrieve all lead records
        return view('lead.all-lead', compact('leads')); // Pass leads to the view
    }

    public function add()
    {
        return view('lead.add-lead'); // Adjust the view path as necessary
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id); // Find the lead by ID
        return view('lead.edit-lead', compact('lead')); // Pass lead to the view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'phone_number' => 'required|string|max:20',
            'lead_source' => 'required|string',
            'status' => 'required|string',          // Validate 'status' field
            'lead_note' => 'nullable|string',       // Rename 'reference' to 'lead_note'
        ]);

        // Create a new lead record
        Lead::create($request->only(['name', 'email', 'phone_number', 'lead_source', 'status', 'lead_note']));

        // Redirect to the leads list with a success message
        return redirect()->route('lead.all-lead')->with('success', 'Lead added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,' . $id,
            'phone_number' => 'required|string|max:20',
            'lead_source' => 'required|string',
            'status' => 'required|string',          // Validate 'status' field
            'lead_note' => 'nullable|string',       // Rename 'reference' to 'lead_note'
        ]);

        // Find the lead and update it
        $lead = Lead::findOrFail($id);
        $lead->update($request->only(['name', 'email', 'phone_number', 'lead_source', 'status', 'lead_note']));

        // Redirect to the leads list with a success message
        return redirect()->route('lead.all-lead')->with('success', 'Lead updated successfully.');
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect()->route('lead.all-lead')->with('success', 'Lead deleted successfully.');
    }

    public function view($id)
    {
        $lead = Lead::findOrFail($id); // Find the lead by ID
        return view('lead.all-lead', compact('lead')); // Pass lead details to the view
    }

    public function convertToClient($id)
    {
        // Find the lead by ID
        $lead = Lead::findOrFail($id);

        // Check if a client with the same email already exists
        $clientExists = Client::where('email', $lead->email)->exists();
        if ($clientExists) {
            return redirect()->route('lead.all-lead')->with('error', 'Client with this email already exists.');
        }


        // Create a new client using lead details
        Client::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'phone_no' => $lead->phone_number,
            'country' => 'Unknown', // Default value or modify as necessary
            'password' => bcrypt('defaultpassword'), // Set a default password or prompt for one
            'note' => $lead->lead_note,
            'salutation' => null, // Modify or remove based on your needs
        ]);

        // Optionally, delete the lead after converting
        $lead->update([
            'status' => 'Converted',
        ]);
        // $lead->delete();

        // Redirect back to the leads list with a success message
        return redirect()->route('client.all-client')->with('success', 'Lead converted to client successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:New,In Progress,Converted,Closed',
        ]);

        $lead = Lead::findOrFail($id);
        $lead->status = $request->input('status');
        $lead->save();

        return redirect()->back()->with('success', 'Lead status updated successfully.');
    }

    public function exportCsv()
    {
        $leads = Lead::all();
        $filename = "leads.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['ID', 'Name', 'Email', 'Phone Number', 'Lead Source', 'Status', 'Lead Note']);

        foreach ($leads as $lead) {
            fputcsv($handle, [$lead->id, $lead->name, $lead->email, $lead->phone_number, $lead->lead_source, $lead->status, $lead->lead_note]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }
    // Function to export leads as PDF
    public function exportPdf()
    {
        // Fetch all leads
        $leads = Lead::all();

        // Load the Blade view and pass the data to it
        $html = view('lead.lead-pdf', compact('leads'))->render();

        // Initialize Dompdf
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF (download it)
        return $dompdf->stream('leads.pdf', ['Attachment' => true]);
    }
    public function adminPendingLeadList()
    {
        // Fetch all leads where status is 'Pending'
        $pendingLeads = Lead::where('status', 'In Progress')->get();

        return $pendingLeads;
    }
}
