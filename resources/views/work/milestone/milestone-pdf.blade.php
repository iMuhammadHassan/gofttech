<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milestones PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>All Milestones</h3>
    <table>
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Milestone</th>
                <th>Delivery Date</th>
                <th>Status</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->project->project_name }}</td>
                    <td>{{ $milestone->milestone_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($milestone->milestone_delivery_date)->format('d M Y') }}</td>
                    <td>{{ $milestone->milestone_status }}</td>
                    <td>{{ $milestone->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
