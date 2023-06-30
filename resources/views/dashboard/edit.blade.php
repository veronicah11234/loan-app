<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Loan</title>
    <!-- Add your CSS styling here -->
</head>
<body>
    @extends('dashboard')
    @section('message')
        @if (session('success'))
            <div class="success">
                {{session('success')}}
            </div>
        @endif
    @endsection
    @section('dashboard-content')
    <h1>Edit Loan</h1>

    @if (Session::has('success'))
        <div class="success-message">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('edit.loan', $loan->id) }}">
        @csrf
        @method('PATCH')

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ $loan->username }}" readonly>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $loan->email }}">

        <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone" value="{{ $loan->phone }}">

        <label for="amount">Loan Amount:</label>
        <input type="number" id="amount" name="amount" min="0" value="{{ $loan->amount }}">

        <label for="purpose">Loan Purpose:</label>
        <textarea id="purpose" name="purpose">{{ $loan->purpose }}</textarea>

        <label for="terms">Loan Terms:</label>
        <select id="terms" name="terms">
            <option value="6 months" @if ($loan->terms === '6 months') selected @endif>6 months</option>
            <option value="12 months" @if ($loan->terms === '12 months') selected @endif>12 months</option>
            <option value="24 months" @if ($loan->terms === '24 months') selected @endif>24 months</option>
            <option value="36 months" @if ($loan->terms === '36 months') selected @endif>36 months</option>
        </select>

        <input type="submit" value="Update">
    </form>
</body>
</html>
