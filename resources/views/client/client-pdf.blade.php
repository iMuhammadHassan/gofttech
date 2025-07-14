<!-- resources/views/client/client-pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients PDF</title>
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
    <h3>All Clients</h3>
    <table>
        <thead>
            <tr>
                <th>Salutation</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Country</th>
                <th>Profile</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->salutation }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_no }}</td>
                    <td>{{ $client->country }}</td>
                    <td>
                        @if ($client->profile)
                            <img src="{{ asset('storage/' . $client->profile) }}" alt="Profile" width="50">
                        @else
                            No Profile
                        @endif
                    </td>
                    <td>{{ Str::limit($client->note, 50) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
