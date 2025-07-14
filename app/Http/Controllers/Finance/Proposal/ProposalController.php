<?php

namespace App\Http\Controllers\Finance\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Lead; // Import the Lead model
use App\Models\Project; // Import the Project model (assuming you have a Project model)
use App\Models\Proposal; // Import the Proposal model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all(); // Fetch all proposals from the database
        return view('finance.proposal.all-proposal', compact('proposals'));
    }

    public function add()
    {
        $leads = Lead::all(); // Get all leads from the database
        $projects = Project::all(); // Get all projects from the database (if you have a Project model)
        return view('finance.proposal.add-proposal', compact('leads', 'projects'));
    }

    public function edit($id)
    {
        $proposal = Proposal::findOrFail($id);
        $leads = Lead::all();
        $projects = Project::all();

        return view('finance.proposal.edit-proposal', compact('proposal', 'leads', 'projects'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'lead_name' => 'required|string',
            'valid_till' => 'required|date',
            'currency' => 'required|string',
            'project' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'signature' => 'required|string',
            'customer_signature' => 'nullable|string',
            'thank_you_note' => 'required|string',
            'require_customer_signature' => 'boolean',
        ]);
        // dd($request->all());

        Proposal::create($validated);

        return redirect()->route('finance.proposal.all-proposal')->with('success', 'Proposal added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lead_name' => 'required|string',
            'valid_till' => 'required|date',
            'currency' => 'required|string',
            'project' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'signature' => 'required|string',
            'customer_signature' => 'nullable|string',
            'thank_you_note' => 'required|string',
            'require_customer_signature' => 'nullable|boolean',
        ]);

        $proposal = Proposal::findOrFail($id);
        $proposal->update([
            'lead_name' => $request->input('lead_name'),
            'valid_till' => $request->input('valid_till'),
            'currency' => $request->input('currency'),
            'project' => $request->input('project'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'signature' => $request->input('signature'),
            'customer_signature' => $request->input('customer_signature'),
            'thank_you_note' => $request->input('thank_you_note'),
            'require_customer_signature' => $request->input('require_customer_signature') ? true : false,
        ]);

        return Redirect::route('finance.proposal.all-proposal')->with('success', 'Proposal updated successfully.');
    }


    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();

        return redirect()->route('finance.proposal.index')->with('success', 'Proposal deleted successfully.');
    }
    // Export proposals as CSV
    public function exportCsv()
    {
        $proposals = Proposal::all();
        $filename = "proposals.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Lead Name', 'Project', 'Valid Till', 'Currency', 'Amount', 'Description', 'Customer Signature', 'Thank You Note', 'Status']);

        foreach ($proposals as $proposal) {
            fputcsv($handle, [
                $proposal->lead_name,
                $proposal->project,
                $proposal->valid_till->format('d M Y'),
                $proposal->currency,
                $proposal->amount,
                $proposal->description,
                $proposal->customer_signature ? 'Signed' : 'Not Signed',
                $proposal->thank_you_note,
                $proposal->status ? 'Active' : 'Inactive'
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export proposals as PDF
    public function exportPdf()
    {
        $proposals = Proposal::all();
        $html = view('finance.proposal.proposal-pdf', compact('proposals'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('proposals.pdf', ['Attachment' => true]);
    }

}