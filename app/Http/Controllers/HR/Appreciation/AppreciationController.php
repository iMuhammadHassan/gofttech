<?php

namespace App\Http\Controllers\HR\Appreciation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appreciation;
use App\Models\Employee;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class AppreciationController extends Controller
{
    public function index()
    {
        $appreciations = Appreciation::with('employee')->get();
        return view('hr.appreciation.all-appreciation', compact('appreciations'));
    }

    public function add()
    {
        $employees = Employee::all(); // Fetch all employees to populate the dropdown
        return view('hr.appreciation.add-appreciation', compact('employees'));
    }

    public function edit($id)
    {
        $appreciation = Appreciation::findOrFail($id);
        $employees = Employee::all(); // Fetch all employees to populate the dropdown
        return view('hr.appreciation.edit-appreciation', compact('appreciation', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'award_name' => 'required|string|max:255',
            'appreciation_amount' => 'required|numeric',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date_format:d-m-Y', // Validate the date format
            'summary' => 'nullable|string',
        ]);

        $formattedDate = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        Appreciation::create([
            'award_name' => $request->award_name,
            'appreciation_amount' => $request->appreciation_amount,
            'employee_id' => $request->employee_id,
            'date' => $formattedDate, // Save the formatted date
            'summary' => $request->summary,
        ]);

        return redirect()->route('appreciation.all-appreciation')->with('success', 'Appreciation added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'award_name' => 'required|string|max:255',
            'appreciation_amount' => 'required|numeric',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date_format:d-m-Y', // Validate the date format
            'summary' => 'nullable|string',
        ]);

        $formattedDate = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        $appreciation = Appreciation::findOrFail($id);
        $appreciation->update([
            'award_name' => $request->award_name,
            'appreciation_amount' => $request->appreciation_amount,
            'employee_id' => $request->employee_id,
            'date' => $formattedDate, // Save the formatted date
            'summary' => $request->summary,
        ]);

        return redirect()->route('appreciation.all-appreciation')->with('success', 'Appreciation updated successfully!');
    }

    public function destroy($id)
    {
        $appreciation = Appreciation::findOrFail($id);
        $appreciation->delete();
        return redirect()->route('appreciation.all-appreciation');
    }
    // Export appreciations as CSV
    public function exportCsv()
    {
        $appreciations = Appreciation::with('employee')->get();
        $filename = "appreciations.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Award Name', 'Appreciation Amount', 'Employee Name', 'Date', 'Summary']);

        foreach ($appreciations as $appreciation) {
            fputcsv($handle, [
                $appreciation->award_name,
                $appreciation->appreciation_amount,
                $appreciation->employee->employee_name,
                Carbon::parse($appreciation->date)->format('d M Y'),
                $appreciation->summary,
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export appreciations as PDF
    public function exportPdf()
    {
        $appreciations = Appreciation::with('employee')->get();

        // Load view for the PDF
        $html = view('hr.appreciation.appreciation-pdf', compact('appreciations'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('appreciations.pdf', ['Attachment' => true]);
    }

}
