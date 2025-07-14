<?php

namespace App\Http\Controllers\Work\Milestone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\Project;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::with('project')->get();
        return view('work.milestone.all-milestone', compact('milestones'));
    }
    public function add()
    {
        $projects = Project::all();
        return view('work.milestone.add-milestone', compact('projects')); // Pass projects to the view
    }
    public function edit($id)
    {
        $milestone = Milestone::findOrFail($id);
        $projects = Project::all(); // Assuming you have a Project model to fetch projects
        return view('work.milestone.edit-milestone', compact('milestone', 'projects'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'milestone_name' => 'required|string|max:255',
            'milestone_delivery_date' => 'required|date_format:d-m-Y', // Adjust validation format
            'milestone_status' => 'required|in:Not Started,In Progress,Completed',
            'description' => 'nullable|string',
        ]);

        // Convert the date format to YYYY-MM-DD
        $milestoneDeliveryDate = Carbon::createFromFormat('d-m-Y', $request->input('milestone_delivery_date'))->format('Y-m-d');

        Milestone::create([
            'project_id' => $request->input('project_id'),
            'milestone_name' => $request->input('milestone_name'),
            'milestone_delivery_date' => $milestoneDeliveryDate,
            'milestone_status' => $request->input('milestone_status'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('work.milestone.all-milestone')->with('success', 'Milestone added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'milestone_name' => 'required|string|max:255',
            'milestone_delivery_date' => 'required|date',
            'milestone_status' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $milestone = Milestone::findOrFail($id);

        $milestoneDeliveryDate = Carbon::createFromFormat('d-m-Y', $request->input('milestone_delivery_date'))->format('Y-m-d');

        $milestone->update([
            'project_id' => $request->input('project_id'),
            'milestone_name' => $request->input('milestone_name'),
            'milestone_delivery_date' => $milestoneDeliveryDate,
            'milestone_status' => $request->input('milestone_status'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('work.milestone.all-milestone')->with('success', 'Milestone updated successfully');
    }

    public function destroy($id)
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return redirect()->route('work.milestone.all-milestone')->with('success', 'Milestone deleted successfully');
    }

    public function view()
    {

        // $clientId = auth()->user()->id;

        // Fetch all projects that belong to the logged-in client
        $projects = Project::where('client_id', 1)->pluck('id');

        // Fetch all milestones for the projects that belong to the logged-in client
        $milestones = Milestone::whereIn('project_id', $projects)->paginate(10); // Adjust the number of items per page as needed

        return view('client-dash.milestone.all-milestone', compact('milestones'));

    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'milestone_status' => 'required|in:Not Started,In Progress,Completed',
        ]);

        $milestone = Milestone::findOrFail($id);

        $milestone->update([
            'milestone_status' => $request->input('milestone_status'),
        ]);

        return redirect()->route('work.milestone.all-milestone')->with('success', 'Milestone status updated successfully');
    }
    // Export Milestones as CSV
    public function exportCsv()
    {
        $milestones = Milestone::with('project')->get();
        $filename = "milestones.csv";

        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Project Name', 'Milestone', 'Delivery Date', 'Status', 'Description']);

        foreach ($milestones as $milestone) {
            fputcsv($handle, [
                $milestone->project->project_name,
                $milestone->milestone_name,
                Carbon::parse($milestone->milestone_delivery_date)->format('d M Y'),
                $milestone->milestone_status,
                $milestone->description
            ]);
        }

        fclose($handle);

        return Response::download($filename)->deleteFileAfterSend(true);
    }

    // Export Milestones as PDF
    public function exportPdf()
    {
        $milestones = Milestone::with('project')->get();

        $html = view('work.milestone.milestone-pdf', compact('milestones'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('milestones.pdf', ['Attachment' => true]);
    }

    public function apiIndex()
    {
        // Assume that client_id is provided as a query parameter, for example, for logged-in clients.
        $clientId = 1; // This can be dynamic for logged-in clients.

        // Fetch all project IDs that belong to the client
        $projectIds = Project::where('client_id', $clientId)->pluck('id');

        // Fetch all milestones for the client's projects
        $milestones = Milestone::whereIn('project_id', $projectIds)->paginate(10); // Optional pagination

        return response()->json($milestones);
    }

    public function adminPendingMilestoneList()
    {
        // Fetch milestones with status 'Pending' and load relationships with project
        $pendingMilestones = Milestone::where('milestone_status', 'In Progress')->with('project')->get();

        // Return the pending milestones
        return $pendingMilestones;
    }
    public function apiClientMilestones()
    {
        // Hardcode client ID for testing
        $clientId = 1; // Replace 1 with dynamic client ID if needed in the future

        // Fetch all project IDs that belong to the client
        $projectIds = Project::where('client_id', $clientId)->pluck('id');

        // Fetch all milestones for the client's projects
        $milestones = Milestone::whereIn('project_id', $projectIds)->paginate(10); // Optional pagination

        return response()->json($milestones);
    }







}
