<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio PDF</title>
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
    <h3>All Portfolios</h3>
    <table>
        <thead>
            <tr>
                <th>Project Title</th>
                <th>Date</th>
                <th>Domain</th>
                <th>Main Description</th>
                <th>Inner Description 1</th>
                <th>Inner Description 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->project_title }}</td>
                    <td>{{ \Carbon\Carbon::parse($portfolio->date)->format('d M Y') }}</td>
                    <td>{{ $portfolio->domain }}</td>
                    <td>{{ $portfolio->main_description }}</td>
                    <td>{{ $portfolio->inner_description_1 }}</td>
                    <td>{{ $portfolio->inner_description_2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
