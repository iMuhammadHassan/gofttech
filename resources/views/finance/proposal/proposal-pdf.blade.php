<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposals PDF</title>
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
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h3>All Proposals</h3>
    <table>
        <thead>
            <tr>
                <th>Lead Name</th>
                <th>Project</th>
                <th>Valid Till</th>
                <th>Currency</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Customer Signature</th>
                <th>Thank You Note</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->lead_name }}</td>
                    <td>{{ $proposal->project }}</td>
                    <td>{{ $proposal->valid_till->format('d M Y') }}</td>
                    <td>{{ $proposal->currency }}</td>
                    <td>{{ $proposal->amount }}</td>
                    <td>{{ $proposal->description }}</td>
                    <td>{{ $proposal->customer_signature ? 'Signed' : 'Not Signed' }}</td>
                    <td>{{ $proposal->thank_you_note }}</td>
                    <td>{{ $proposal->status ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
