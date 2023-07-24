<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        h2 {
            text-align: center;
        }
        
        form {
            max-width: 500px;
            margin: 0 auto;
        }
        
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="id"],
        input[type="text"],
        input[type="email"],
        input[type="phone"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        select {
            height: 40px;
        }
        
        textarea {
            height: 100px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Add your custom styling here */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td button {
            background-color: #ff0000;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        td button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    {{-- @extends('dashboard') --}}

    {{-- @section('dashboard-content') --}}
        <h1>Apply for a loan here </h1>
        @if (Session::has('success'))
            <div class="success-message">
                {{Session::get('success')}}
            </div>
        @endif
        <h2>Apply Loan Form</h2>

        <form action="{{route('apply_loan')}}" method="POST">
            @csrf
            <div>
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
            </div>
            <div>
                <input type="text" name="username" value="{{Auth::user()->username}}" readonly>
            </div>
            <div>
                <input type="email" name="email" value="{{Auth::user()->email}}" readonly>
            </div>
            <div>
                <input type="number" name="phone" placeholder="Enter phone number" value="{{old('phone')}}" required>
                <span class="input-error">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div>
                <input type="number" name="amount" placeholder="Enter desired amount" value="{{old('amount')}}" required>
                <span class="input-error">
                    @error('amount')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <label for="purpose">Loan Purpose:</label>
            <textarea id="purpose" name="purpose" required></textarea><br><br>

            <label for="terms">Loan Terms:</label>
            <select id="terms" name="terms" required>
                <option value="6 months">6 months</option>
                <option value="12 months">12 months</option>
                <option value="24 months">24 months</option>
                <option value="36 months">36 months</option>
            </select><br><br>

            <button type="submit">Apply</button>
        </form>

        <h1>Applied Loans</h1>
        {{-- <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Purpose</th>
                    <th>Terms</th>
                    <th colspan="2" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($loans ?? ''->count() > 0)
                    @foreach ($loans ?? '' as $loan)
                        <tr>
                            <form method="POST" action="{{route('delete.loan','edit.loan', $loan->id)}}">
                                @csrf
                                @method('PATCH')
                                @method('EDIT')
                                   <button type="submit">EDIT</button>
                                <td><input type="text" name="username" value="{{Auth::user()->username}}" readonly></td>
                                <td><input type="text" name="email" value="{{$loan->email}}"></td>
                                <td><input type="text" name="phone" value="{{$loan->phone}}"></td>
                                <td><input type="number" name="amount" value="{{$loan->amount}}"></td>
                                <td><input type="text" name="purpose" value="{{$loan->purpose}}"></td>
                                <td><input type="text" name="terms" value="{{$loan->terms}}"></td>
                                <td><input type="submit" name="edit" value="Edit"></td>
                            </form>
                            <td>
                                <form method="POST" action="{{route('delete.loan', $loan->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No loans found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @endsection --}}
</body>
</html>
