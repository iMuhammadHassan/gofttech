<?php

namespace App\Http\Controllers\HR\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department; // Include the Department model

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all(); // Fetch all departments
        return view('hr.department.all-department', compact('departments')); // Pass departments to the view
    }

    public function add()
    {
        return view('hr.department.add-department'); // View for adding a department
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id); // Find department by ID
        return view('hr.department.edit-department', compact('department')); // Pass department to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Department::create([
            'name' => $request->name,
        ]);

        return redirect()->route('department.all-department')->with('success', 'Department added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name,
        ]);

        return redirect()->route('department.all-department')->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('department.all-department')->with('success', 'Department deleted successfully.');
    }
}
