<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .success{
            background-color: green;
            color: white;
            width: 80%;
            padding: 14px 28px;
            border-radius: 10px;
        }
    </style>
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
        <h1>Basic Info.</h1>
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            @method('patch')
            <div>
                <input type="text" name="username" value="{{$user->username}}">
            </div>
            <div>
                <input type="text" name="email" value="{{$user->email}}">
            </div>
            <div>
                <input type="submit" name="update" value="Update">
            </div>
        </form>
        <h1>More info.</h1>
        <label for="name">First Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="name">Last name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="name">Balance :</label>
        <input type="text" id="name" name="name" required><br><br>

        <div>
            <input type="submit" name="Delete profile" value="Delete profile">
        </div>
    @endsection
    
</body>
</html>