<?php

namespace App\Http\Controllers\Report\TaskReport;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use Dompdf\Dompdf; // Import DomPDF for generating PDF
use Illuminate\Support\Facades\Response;
class TaskReportController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all projects and employees for filters
        $projects = Project::all();
        $employees = Employee::all();

        // Initialize query for tasks
        $tasksQuery = Task::query();

        // Apply status filter
        if ($request->has('status') && !empty($request->status)) {
            $tasksQuery->where('status', $request->status);
        }

        // Apply project filter
        if ($request->has('project_id') && !empty($request->project_id)) {
            $tasksQuery->where('project_id', $request->project_id);
        }

        // Apply employee filter
        if ($request->has('assigned_to') && !empty($request->assigned_to)) {
            $tasksQuery->where('assigned_to', $request->assigned_to);
        }

        // Get filtered tasks
        $tasks = $tasksQuery->with('project', 'employee')->get();

        // Return the filtered results to the view
        return view('report.task-report.all-task-report', compact('tasks', 'projects', 'employees'));
    }

    public function exportPdf(Request $request)
    {
        $tasks = $this->getFilteredTasks($request);

        // Generate PDF using DomPDF
        $dompdf = new Dompdf();
        $html = view('report.task-report.pdf-task-report', compact('tasks'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('task-report.pdf', ['Attachment' => true]); // Stream the PDF for download
    }

    public function exportExcel(Request $request)
    {
        $tasks = $this->getFilteredTasks($request);
        $fileName = 'task-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        // Callback to output CSV content
        $callback = function () use ($tasks) {
            $file = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($file, ['Task', 'Project', 'Assigned To', 'Status', 'Start Date', 'End Date']);

            // Add data rows
            foreach ($tasks as $task) {
                fputcsv($file, [
                    $task->description,
                    $task->project->project_name,
                    $task->employee->employee_name,
                    $task->status,
                    $task->start_date,
                    $task->end_date,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers); // Stream the CSV for download
    }

    // Helper method to fetch filtered tasks (reuse from index)
    private function getFilteredTasks($request)
    {
        $query = Task::query();

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        if ($request->has('project_id') && !empty($request->project_id)) {
            $query->where('project_id', $request->project_id);
        }

        if ($request->has('assigned_to') && !empty($request->assigned_to)) {
            $query->where('assigned_to', $request->assigned_to);
        }

        return $query->with('project', 'employee')->get();
    }
}
