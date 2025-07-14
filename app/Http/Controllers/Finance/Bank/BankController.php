<?php

namespace App\Http\Controllers\Finance\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all(); // Retrieve all bank records
        return view('finance.bank.all-bank', compact('banks'));
    }

    public function add()
    {
        return view('finance.bank.add-bank');
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id); // Find the bank by ID
        return view('finance.bank.edit-bank', compact('bank'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        Bank::create($validatedData);

        return redirect()->route('finance.bank.all-bank')->with('success', 'Bank added successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $bank = Bank::findOrFail($id);
        $bank->update($validatedData);

        return redirect()->route('finance.bank.all-bank')->with('success', 'Bank updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        return redirect()->route('finance.bank.all-bank')->with('success', 'Bank deleted successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming request to ensure 'status' is valid
        $request->validate([
            'status' => 'required|string|in:Active,Inactive',
        ]);

        // Find the bank by ID or throw an exception if not found
        $bank = Bank::findOrFail($id);

        // Update the bank's status
        $bank->status = $request->input('status');
        $bank->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bank status updated successfully.');
    }
    // Export banks as CSV
    public function exportCsv()
    {
        $banks = Bank::all();
        $filename = "banks.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Bank Name', 'Account Holder', 'Account Number', 'Contact Number', 'Status']);

        foreach ($banks as $bank) {
            fputcsv($handle, [
                $bank->name,
                $bank->account_holder,
                $bank->account_number,
                $bank->contact_number,
                $bank->status
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export banks as PDF
    public function exportPdf()
    {
        $banks = Bank::all();

        $html = view('finance.bank.bank-pdf', compact('banks'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('banks.pdf', ['Attachment' => true]);
    }


}
