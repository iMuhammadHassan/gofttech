<?php

namespace App\Http\Controllers\HR\Designation;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('hr.designation.all-designation', compact('designations'));
    }

    public function add()
    {
        return view('hr.designation.add-designation');
    }

    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        return view('hr.designation.edit-designation', compact('designation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Designation::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('designation.all-designation')->with('success', 'Designation created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $designation = Designation::findOrFail($id);
        $designation->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('designation.all-designation')->with('success', 'Designation updated successfully.');
    }

    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('designation.all-designation')->with('success', 'Designation deleted successfully.');
    }
}
