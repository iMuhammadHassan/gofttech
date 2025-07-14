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
    </style>
</head>

<body>
    <h2>Expense Report</h2>
    <table>
        <thead>
            <tr>
                <th>Expense ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Purchased Date</th>
                <th>Category</th>
                <th>Project</th>
                <th>Bank</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->title }}</td>
                    <td>{{ $expense->price }}</td>
                    <td>{{ $expense->purchased_date }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $expense->category)) }}</td>
                    <td>{{ $expense->project }}</td>
                    <td>{{ $expense->bank }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>{{ $expense->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
