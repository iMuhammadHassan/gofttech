{{-- report/task-report/pdf-task-report.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Task Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Task Report</h1>
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Project</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->project->project_name }}</td>
                    <td>{{ $task->employee->employee_name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
