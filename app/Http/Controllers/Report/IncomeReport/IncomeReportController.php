<?php

namespace App\Http\Controllers\Report\IncomeReport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dompdf\Dompdf; // Import DomPDF for generating PDF
use Illuminate\Support\Facades\Response;

class IncomeReportController extends Controller
{
    public function index()
    {
        return view('report.income-report.all-income-report');
    }

    public function exportPdf()
    {
        $incomes = $this->getIncomeData(); // Replace with actual logic to get income data

        // Generate PDF using DomPDF
        $dompdf = new Dompdf();
        $html = view('report.income-report.pdf-income-report', compact('incomes'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('income-report.pdf', ['Attachment' => true]); // Stream the PDF for download
    }

    // Export to Excel (CSV)
    public function exportExcel()
    {
        $incomes = $this->getIncomeData(); // Replace with actual logic to get income data
        $fileName = 'income-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Callback to output CSV content
        $callback = function () use ($incomes) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['Customer Code', 'Customer Name', 'Amount', 'Paid', 'Amount Due', 'Status', 'Payment Status']);

            // Add data rows
            foreach ($incomes as $income) {
                fputcsv($file, [
                    $income['customer_code'],
                    $income['customer_name'],
                    $income['amount'],
                    $income['paid'],
                    $income['amount_due'],
                    $income['status'],
                    $income['payment_status'],
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers); // Stream the CSV for download
    }

    // Dummy method to simulate income data (replace this with actual database logic)
    private function getIncomeData()
    {
        return [
            ['customer_code' => 'CT_1001', 'customer_name' => 'Thomas21', 'amount' => 1500, 'paid' => 1500, 'amount_due' => 0, 'status' => 'Completed', 'payment_status' => 'Paid'],
            ['customer_code' => 'CT_1002', 'customer_name' => '504Benjamin', 'amount' => 10, 'paid' => 10, 'amount_due' => 0, 'status' => 'Completed', 'payment_status' => 'Overdue'],
            ['customer_code' => 'CT_1003', 'customer_name' => 'James 524', 'amount' => 10, 'paid' => 10, 'amount_due' => 0, 'status' => 'Completed', 'payment_status' => 'Overdue'],
        ];
    }

}