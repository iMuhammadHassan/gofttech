<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Quotation Report</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Type</th>
                <th>Sub-Type</th>
                <th>Screens/Pages</th>
                <th>Design Category</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotations as $quotation)
                <tr>
                    <td>{{ $quotation->id }}</td>
                    <td>{{ $quotation->project_name }}</td>
                    <td>{{ ucfirst($quotation->type) }}</td>
                    <td>{{ ucfirst($quotation->sub_type) }}</td>
                    <td>
                        @if($quotation->sub_type === 'app')
                            {{ $quotation->number_of_screens }} Screens
                        @elseif($quotation->sub_type === 'web')
                            {{ $quotation->number_of_pages }} Pages
                        @endif
                    </td>
                    <td>{{ ucfirst($quotation->design_category) }}</td>
                    <td>{{ $quotation->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
