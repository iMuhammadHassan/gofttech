<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banks PDF</title>
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
    <h3>All Banks</h3>
    <table>
        <thead>
            <tr>
                <th>Bank Name</th>
                <th>Account Holder</th>
                <th>Account Number</th>
                <th>Contact Number</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
                <tr>
                    <td>{{ $bank->name }}</td>
                    <td>{{ $bank->account_holder }}</td>
                    <td>{{ $bank->account_number }}</td>
                    <td>{{ $bank->contact_number }}</td>
                    <td>{{ $bank->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
