<?php

namespace App\Http\Controllers\HR\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')->get(); // Fetch leaves and their associated employees
        return view('hr.leave.all-leave', compact('leaves'));
        ; // Adjust the view path as necessary
    }
    public function add()
    {
        $employees = Employee::all();
        return view('hr.leave.add-leave', compact('employees')); // Adjust the view path as necessary
    }
    public function edit($id)
    {
        $leave = Leave::findOrFail($id); // Fetch leave by ID
        $employees = Employee::all(); // Fetch all employees for the dropdown
        return view('hr.leave.edit-leave', compact('leave', 'employees')); // Pass both leave and employees to the view
    }
    

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required|string',
            'status' => 'required|string',
            'date' => 'required|date_format:d-m-Y', // Ensure the date format matches
            'reason' => 'required|string',
        ]);



        $formattedDate = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        Leave::create([
            'employee_id' => $validatedData['employee_id'],
            'leave_type' => $validatedData['leave_type'],
            'status' => $validatedData['status'],
            'date' => $formattedDate,
            'reason' => $validatedData['reason'],
        ]);



        return redirect()->route('leave.all-leave')->with('success', 'Leave request added successfully!');
    }

    public function update(Request $request, $id)
    {
        // Fetch the leave record
        $leave = Leave::findOrFail($id);

        // Validate the request
        $request->validate([
            'leave_type' => 'required|in:casual,sick,earned',
            'status' => 'required|in:approved,pending,rejected',
            'date' => 'required|date_format:d-m-Y',
            'reference_no' => 'nullable|string|max:255',
            'reason' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Convert date format
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        // Update the leave record
        $leave->update([
            'leave_type' => $request->input('leave_type'),
            'status' => $request->input('status'),
            'date' => $date,
            'reference_no' => $request->input('reference_no'),
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
        ]);

        // Redirect to the all leave view with success message
        return redirect()->route('leave.all-leave')->with('success', 'Leave updated successfully!');
    }
    public function destroy($id)
    {
        // Find the leave record by ID
        $leave = Leave::findOrFail($id);

        // Delete the record
        $leave->delete();

        // Redirect back with a success message
        return redirect()->route('leave.all-leave')->with('success', 'Leave record deleted successfully.');
    }
}
