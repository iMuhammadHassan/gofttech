<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Project Report</h1>
    <table>
        <thead>
            <tr>
                <th>Short Code</th>
                <th>Project Name</th>
                <th>Start Date</th>
                <th>Deadline</th>
                <th>Price</th>
                <th>Department</th>
                <th>Client</th>
                <th>Assigned Member</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->short_code }}</td>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->deadline)->format('d M Y') }}</td>
                    <td>{{ $project->price }}</td>
                    <td>{{ $project->department->name }}</td>
                    <td>{{ $project->client->name }}</td>
                    <td>{{ $project->member->employee_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
