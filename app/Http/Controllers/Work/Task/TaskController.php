<?php

namespace App\Http\Controllers\Work\Task;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf; // Import Dompdf for PDF generation
use Illuminate\Support\Facades\Response;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // Or any other method to get tasks
        $employees = Employee::all(); // Fetch all employees

        return view('work.task.all-task', compact('tasks', 'employees'));
    }
    public function add()
    {
        // Fetch employees and projects for the form

        $projects = Project::all();
        $employees = Employee::all();
        return view('work.task.add-task', compact('projects', 'employees'));
    }

    public function edit($id)
    {
        // Fetch task and related data for editing
        $task = Task::findOrFail($id);
        $projects = Project::all();
        $employees = Employee::all();

        return view('work.task.edit-task', compact('task', 'projects', 'employees'));
    }

    public function store(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|date_format:d-m-Y',
            'end_date' => 'required|date_format:d-m-Y|after_or_equal:start_date',
            'assigned_to' => 'required|exists:employees,id',
            'status' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        // Convert the dates from d-m-Y to Y-m-d
        $validatedData['start_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['start_date'])->format('Y-m-d');
        $validatedData['end_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['end_date'])->format('Y-m-d');


        // Create a new task
        Task::create([
            'project_id' => $validatedData['project_id'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'assigned_to' => $validatedData['assigned_to'],
            'status' => $validatedData['status'],
            'description' => $validatedData['description'],
        ]);

        // Redirect with success message
        return redirect()->route('work.task.all-task')->with('success', 'Task added successfully!');
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'start_date' => 'required|date_format:d-m-Y',
            'end_date' => 'required|date_format:d-m-Y|after_or_equal:start_date',
            'assigned_to' => 'required|exists:employees,id',
            'status' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        // Convert the dates from d-m-Y to Y-m-d for storage in the database
        $validatedData['start_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['start_date'])->format('Y-m-d');
        $validatedData['end_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['end_date'])->format('Y-m-d');

        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update task data
        $task->update([
            'project_id' => $validatedData['project_id'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'assigned_to' => $validatedData['assigned_to'],
            'status' => $validatedData['status'],
            'description' => $validatedData['description'],
        ]);

        // Redirect with success message
        return redirect()->route('work.task.all-task')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        // Find and delete the task
        $task = Task::findOrFail($id);
        $task->delete();

        // Redirect with success message
        return redirect()->route('work.task.all-task')->with('success', 'Task deleted successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'status' => 'required|string|max:50',
        ]);

        // Find the task and update its status
        $task = Task::findOrFail($id);
        $task->update([
            'status' => $validatedData['status'],
        ]);

        // Redirect with success message
        return redirect()->route('work.task.all-task')->with('success', 'Task status updated successfully!');
    }

    public function exportPdf()
    {
        $tasks = Task::with('project', 'employee')->get();
        $dompdf = new Dompdf();
        $html = view('work.task.pdf-task-report', compact('tasks'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('task-report.pdf', ['Attachment' => true]);
    }

    // Excel Export (CSV)
    public function exportExcel()
    {
        $tasks = Task::with('project', 'employee')->get();
        $fileName = 'task-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $callback = function () use ($tasks) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Project Name', 'Start Date', 'End Date', 'Assigned To', 'Status', 'Description']);

            foreach ($tasks as $task) {
                fputcsv($file, [
                    $task->project->project_name,
                    Carbon::parse($task->start_date)->format('d M Y'),
                    Carbon::parse($task->end_date)->format('d M Y'),
                    $task->employee->employee_name,
                    $task->status,
                    $task->description,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }


    public function adminPendingTaskList()
    {
        // Fetch tasks where the status is 'Pending' and load relationships with project and employee
        $pendingTasks = Task::where('status', 'Pending')->with('project', 'employee')->get();

        // Return the list of pending tasks
        return $pendingTasks;
    }


}
