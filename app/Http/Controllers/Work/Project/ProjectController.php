<?php

namespace App\Http\Controllers\Work\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf; // Import Dompdf for PDF generation
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10); // Adjust the number of items per page as needed
        return view('work.project.all-project', compact('projects'));
    }


    public function add()
    {
        // Fetch departments, employees, and clients for the form
        $departments = Department::all();
        $employees = Employee::all();
        $clients = Client::all(); // Fetch all clients

        // Return the view for adding a new project with all necessary data
        return view('work.project.add-project', compact('departments', 'employees', 'clients'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'short_code' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'start_date' => 'required|date_format:d-m-Y', // Validate format as d-m-Y
            'deadline' => 'required|date_format:d-m-Y', // Validate format as d-m-Y
            'department_id' => 'required|exists:departments,id', // Ensure department exists
            'member_id' => 'required|exists:employees,id', // Ensure employee exists
            'client_id' => 'required|exists:clients,id', // Ensure client exists
            'price' => 'required|numeric', // Ensure price is numeric
            'initial_requirement' => 'required|string', // Ensure initial requirement is a string
        ]);

        // Convert the dates from d-m-Y to Y-m-d
        $validatedData['start_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['start_date'])->format('Y-m-d');
        $validatedData['deadline'] = Carbon::createFromFormat('d-m-Y', $validatedData['deadline'])->format('Y-m-d');

        // Find the project by ID
        $project = Project::findOrFail($id);

        // Update the project with the validated data
        $project->update($validatedData);

        // Redirect with a success message
        return redirect()->route('work.project.all-project')->with('success', 'Project updated successfully!');
    }



    public function edit($id)
    {
        // Fetch the project by its ID
        $project = Project::findOrFail($id);

        // Fetch departments, employees, and clients for the form
        $departments = Department::all();
        $employees = Employee::all();
        $clients = Client::all(); // Fetch all clients

        // Return the view for editing the project
        return view('work.project.edit-project', compact('project', 'departments', 'employees', 'clients'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'short_code' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'start_date' => 'required|date_format:d-m-Y',
            'deadline' => 'required|date_format:d-m-Y',
            'price' => 'required|numeric', // Ensure price is validated
            'department_id' => 'required|exists:departments,id',
            'member_id' => 'required|exists:employees,id',
            'client_id' => 'required|exists:clients,id',
            'initial_requirement' => 'required|string',
        ]);

        // Convert the dates to the format MySQL expects
        $validatedData['start_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['start_date'])->format('Y-m-d');
        $validatedData['deadline'] = Carbon::createFromFormat('d-m-Y', $validatedData['deadline'])->format('Y-m-d');

        // Create a new project
        Project::create($validatedData);

        // Redirect to the project list or another appropriate page
        return redirect()->route('work.project.all-project')->with('success', 'Project added successfully!');
    }



    public function destroy($id)
    {
        // Find the project by its ID
        $project = Project::findOrFail($id);

        // Delete the project
        $project->delete();

        // Redirect to the project list with a success message
        return redirect()->route('work.project.all-project')->with('success', 'Project deleted successfully!');
    }

    //client view project
    public function view()
    {
        // Get the currently logged-in client's ID
        // $clientId = auth()->user()->id;

        // Fetch the projects that belong to the logged-in client
        $projects = Project::where('client_id', 1)->paginate(10); // Adjust the number of items per page as needed

        return view('client-dash.project.all-project', compact('projects'));
    }


    public function exportPdf()
    {
        $projects = Project::with('department', 'client', 'member')->get();
        $dompdf = new Dompdf();
        $html = view('work.project.pdf-project-report', compact('projects'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('project-report.pdf', ['Attachment' => true]);
    }

    public function exportExcel()
    {
        $projects = Project::with('department', 'client', 'member')->get();
        $fileName = 'project-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($projects) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Short Code', 'Project Name', 'Start Date', 'Deadline', 'Price', 'Department', 'Client', 'Assigned Member']);

            foreach ($projects as $project) {
                fputcsv($file, [
                    $project->short_code,
                    $project->project_name,
                    Carbon::parse($project->start_date)->format('d M Y'),
                    Carbon::parse($project->deadline)->format('d M Y'),
                    $project->price,
                    $project->department->name,
                    $project->client->name,
                    $project->member->employee_name,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function apiIndex()
    {
        // Fetch all projects with related department, member, and client details
        $projects = Project::with('department', 'member', 'client')->paginate(10); // Optional pagination
        return response()->json($projects);
    }

    public function apiClientProjects()
    {
        // Assuming the user is authenticated and you want to filter projects by the logged-in client's ID
        // $clientId = auth()->user()->id;

        // Fetch projects that belong to the logged-in client
        $projects = Project::where('client_id', 1)->paginate(10); // Optional pagination

        return response()->json($projects);
    }


}
