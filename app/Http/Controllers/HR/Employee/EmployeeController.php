<?php

namespace App\Http\Controllers\HR\Employee;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all(); // Fetch all employees
        return view('hr.employee.all-employee', compact('employees'));
    }

    public function add()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('hr.employee.add-employee', compact('departments', 'designations')); // Pass departments to the view
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $designations = Designation::all();
        return view('hr.employee.edit-employee', compact('employee', 'departments', 'designations')); // Pass employee and departments to the view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date_format:d-m-Y',  // Expecting input in d-m-Y format
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'mobile_no' => 'required|string|max:15',
            'join_date' => 'required|date_format:d-m-Y',  // Expecting input in d-m-Y format
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
        ]);

        // Convert dates from d-m-Y to Y-m-d
        $dob = Carbon::createFromFormat('d-m-Y', $request->input('dob'))->format('Y-m-d');
        $joinDate = Carbon::createFromFormat('d-m-Y', $request->input('join_date'))->format('Y-m-d');

        // Create a new employee object and fill it with request data (excluding password and picture)
        $employee = new Employee($request->except('password', 'picture', 'dob', 'join_date'));

        // Assign the formatted dates to the employee
        $employee->dob = $dob;
        $employee->join_date = $joinDate;

        // Hash the password before storing
        $employee->password = Hash::make($request->password);

        // Handle file upload for picture
        if ($request->hasFile('picture')) {
            $employee->picture = $request->file('picture')->store('employees', 'public');
        }

        // Save the employee to the database
        $employee->save();

        // Redirect back with a success message
        return redirect()->route('employee.all-employee')->with('success', 'Employee added successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'password' => 'nullable|string|min:8',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date_format:d-m-Y', // Expecting input as d-m-Y
            'department' => 'required|exists:departments,id',
            'designation' => 'required|exists:designations,id',
            'mobile_no' => 'required|string|max:15',
            'join_date' => 'required|date_format:d-m-Y', // Expecting input as d-m-Y
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
        ]);

        // Convert dates from d-m-Y to Y-m-d
        $dob = Carbon::createFromFormat('d-m-Y', $request->input('dob'))->format('Y-m-d');
        $joinDate = Carbon::createFromFormat('d-m-Y', $request->input('join_date'))->format('Y-m-d');

        // Find the employee record and fill other fields
        $employee = Employee::findOrFail($id);
        $employee->fill($request->except('password', 'picture', 'dob', 'join_date'));

        // Update the converted date fields
        $employee->dob = $dob;
        $employee->join_date = $joinDate;

        // Check if password is provided, then hash and store it
        if ($request->filled('password')) {
            $employee->password = Hash::make($request->password);
        }

        // Check if a new picture is uploaded and store it
        if ($request->hasFile('picture')) {
            $employee->picture = $request->file('picture')->store('employees', 'public');
        }

        // Save the updated employee data
        $employee->save();

        // Redirect with success message
        return redirect()->route('employee.all-employee')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.all-employee')->with('success', 'Employee deleted successfully!');
    }

    public function exportCsv()
    {
        $employees = Employee::with('department', 'designation')->get();
        $filename = "employees.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Employee Name', 'Email', 'Department', 'Designation', 'Mobile No', 'Date of Birth', 'Join Date']);

        foreach ($employees as $employee) {
            fputcsv($handle, [
                $employee->employee_name,
                $employee->email,
                $employee->department->name,
                $employee->designation->name,
                $employee->mobile_no,
                Carbon::parse($employee->dob)->format('d M Y'),
                Carbon::parse($employee->join_date)->format('d M Y')
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export employees as PDF
    public function exportPdf()
    {
        $employees = Employee::with('department', 'designation')->get();

        // Load view for the PDF
        $html = view('hr.employee.employee-pdf', compact('employees'))->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF
        $dompdf->render();

        // Stream the PDF file for download
        return $dompdf->stream('employees.pdf', ['Attachment' => true]);
    }

}
