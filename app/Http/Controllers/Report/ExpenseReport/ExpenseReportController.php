<?php

namespace App\Http\Controllers\Report\ExpenseReport;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Project;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class ExpenseReportController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all projects for the filter dropdown
        $projects = Project::all();

        // Initialize the query for expenses
        $query = Expense::query();

        // Apply 'From Date' filter
        if ($request->filled('from_date')) {
            $query->where('purchased_date', '>=', $request->from_date);
        }

        // Apply 'To Date' filter
        if ($request->filled('to_date')) {
            $query->where('purchased_date', '<=', $request->to_date);
        }

        // Apply 'Category' filter (handle nulls and trimming)
        if ($request->filled('category')) {
            $category = strtolower(trim($request->category));
            $query->whereRaw('LOWER(TRIM(category)) = ?', [$category]);
        }

        // Apply 'Project' filter
        if ($request->filled('project')) {
            $query->where('project', $request->project);
        }

        // Get the filtered results
        $expenses = $query->get();

        // Return the view with filtered expenses and projects
        return view('report.expense-report.all-expense-report', compact('expenses', 'projects'));
    }

    public function exportPdf(Request $request)
    {
        $expenses = $this->getFilteredExpenses($request);

        // Generate PDF using DomPDF
        $dompdf = new Dompdf();
        $html = view('report.expense-report.pdf-expense-report', compact('expenses'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('expense-report.pdf', ['Attachment' => true]); // Stream the PDF for download
    }

    // Export to Excel (CSV)
    public function exportExcel(Request $request)
    {
        $expenses = $this->getFilteredExpenses($request);
        $fileName = 'expense-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Callback to output CSV content
        $callback = function () use ($expenses) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['Expense ID', 'Title', 'Price', 'Purchased Date', 'Category', 'Project', 'Bank', 'Description', 'Status']);

            // Add data rows
            foreach ($expenses as $expense) {
                fputcsv($file, [
                    $expense->id,
                    $expense->title,
                    $expense->price,
                    $expense->purchased_date,
                    ucfirst(str_replace('_', ' ', $expense->category)),
                    $expense->project,
                    $expense->bank,
                    $expense->description,
                    $expense->status,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers); // Stream the CSV for download
    }

    // Helper method to fetch filtered expenses (reuse from index)
    private function getFilteredExpenses($request)
    {
        $query = Expense::query();

        if ($request->filled('from_date')) {
            $query->where('purchased_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->where('purchased_date', '<=', $request->to_date);
        }

        if ($request->filled('category')) {
            $category = strtolower(trim($request->category));
            $query->whereRaw('LOWER(TRIM(category)) = ?', [$category]);
        }

        if ($request->filled('project')) {
            $query->where('project', $request->project);
        }

        return $query->get();
    }
}
