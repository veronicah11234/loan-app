<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Loan</title>
    <!-- Add your CSS styling here -->
</head>
<body>
    <h1>Delete Loan</h1>

    <p>Are you sure you want to delete this loan?</p>

    <form method="POST" action="{{ route('delete.loan', $loan->id) }}">
        @csrf
        {{-- @method('DELETE') --}}

        <button type="submit">Delete</button>
    </form>
</body>
</html>
