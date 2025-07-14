<?php

namespace App\Http\Controllers\Finance\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('finance.expense.all-expense', compact('expenses'));
    }

    public function add()
    {
        $projects = Project::all();

        return view('finance.expense.add-expense', compact('projects'));// Adjust the view path as necessary
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id); // Find expense by ID
        return view('finance.expense.edit-expense', compact('expense'));
    }

    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'purchased_date' => 'required|date_format:d-m-Y',
            'category' => 'nullable|string',
            'project' => 'nullable|string',
            'bank' => 'nullable|string',
            'description' => 'nullable|string',
            'receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);
        // dd($request->all());
        // Format the date
        $purchasedDate = Carbon::createFromFormat('d-m-Y', $request->input('purchased_date'))->format('Y-m-d');

        // Handle the receipt file upload
        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }

        // Create a new expense record
        Expense::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'purchased_date' => $purchasedDate,
            'category' => $request->input('category'),
            'project' => $request->input('project'),
            'bank' => $request->input('bank'),
            'description' => $request->input('description'),
            'receipt' => $receiptPath,
        ]);

        return redirect()->route('finance.expense.all-expense')->with('success', 'Expense added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'purchased_date' => 'required|date_format:d-m-Y',
            'category' => 'nullable|string',
            'project' => 'nullable|string',
            'bank' => 'nullable|string',
            'description' => 'nullable|string',
            'receipt' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // Format the date
        $purchasedDate = Carbon::createFromFormat('d-m-Y', $request->input('purchased_date'))->format('Y-m-d');

        // Find the existing expense record
        $expense = Expense::findOrFail($id);

        // Handle the receipt file upload
        if ($request->hasFile('receipt')) {
            // Delete the old receipt if it exists
            if ($expense->receipt) {
                Storage::disk('public')->delete($expense->receipt);
            }
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        } else {
            $receiptPath = $expense->receipt; // Keep existing receipt if no new file is uploaded
        }

        // Update the expense record
        $expense->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'purchased_date' => $purchasedDate,
            'category' => $request->input('category'),
            'project' => $request->input('project'),
            'bank' => $request->input('bank'),
            'description' => $request->input('description'),
            'receipt' => $receiptPath,
        ]);

        return redirect()->route('finance.expense.all-expense')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        // Find the expense record
        $expense = Expense::findOrFail($id);

        // Delete the receipt file if it exists
        if ($expense->receipt) {
            Storage::disk('public')->delete($expense->receipt);
        }

        // Delete the expense record
        $expense->delete();

        return redirect()->route('finance.expense.all-expense')->with('success', 'Expense deleted successfully.');
    }
    public function exportPdf()
    {
        $expenses = Expense::all();

        // Load the view for the PDF
        $html = view('finance.expense.pdf-expense', compact('expenses'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Return the generated PDF
        return $dompdf->stream('expense-report.pdf', ['Attachment' => true]);
    }


    // Excel (CSV) Export
    public function exportExcel()
    {
        $expenses = Expense::all();
        $fileName = 'expense-report.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($expenses) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Title', 'Price', 'Purchased Date', 'Category', 'Project', 'Bank', 'Description']);
            foreach ($expenses as $expense) {
                fputcsv($file, [
                    $expense->title,
                    $expense->price,
                    $expense->purchased_date,
                    ucfirst(str_replace('_', ' ', $expense->category)),
                    $expense->project,
                    $expense->bank,
                    $expense->description,
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}