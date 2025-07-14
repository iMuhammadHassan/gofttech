<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Report</title>
</head>

<body>
    <h1>Income Report</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Customer Code</th>
                <th>Customer Name</th>
                <th>Amount</th>
                <th>Paid</th>
                <th>Amount Due</th>
                <th>Status</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income['customer_code'] }}</td>
                    <td>{{ $income['customer_name'] }}</td>
                    <td>{{ $income['amount'] }}</td>
                    <td>{{ $income['paid'] }}</td>
                    <td>{{ $income['amount_due'] }}</td>
                    <td>{{ $income['status'] }}</td>
                    <td>{{ $income['payment_status'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
