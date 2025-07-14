<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appreciations PDF</title>
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
    <h3>All Appreciations</h3>
    <table>
        <thead>
            <tr>
                <th>Award Name</th>
                <th>Appreciation Amount</th>
                <th>Employee Name</th>
                <th>Date</th>
                <th>Summary</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appreciations as $appreciation)
                <tr>
                    <td>{{ $appreciation->award_name }}</td>
                    <td>{{ $appreciation->appreciation_amount }}</td>
                    <td>{{ $appreciation->employee->employee_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($appreciation->date)->format('d M Y') }}</td>
                    <td>{{ $appreciation->summary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
