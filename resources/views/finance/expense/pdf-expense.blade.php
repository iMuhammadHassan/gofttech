<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

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
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Expense Report</h1>
        <p>Generated on: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Project</th>
                <th>Bank</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->title }}</td>
                    <td>{{ $expense->category }}</td>
                    <td>{{ \Carbon\Carbon::parse($expense->purchased_date)->format('d M Y') }}</td>
                    <td>{{ $expense->price }}</td>
                    <td>{{ $expense->project }}</td>
                    <td>{{ $expense->bank }}</td>
                    <td>{{ $expense->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
