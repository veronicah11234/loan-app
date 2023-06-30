<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Report</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Terms</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->name }}</td>
                <td>{{ $loan->email }}</td>
                <td>{{ $loan->amount }}</td>
                <td>{{ $loan->purpose }}</td>
                <td>{{ $loan->terms }}</td>
                <td>{{ $loan->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
