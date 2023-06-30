
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
         form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color:blue;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('errors')
            @if (Session::has('failed'))
                <div class="error-message">
                    {{Session::get('failed')}}
                </div>
            @endif
    @endsection

    @section('success')
            @if (Session::has('success'))
                <div class="success-message">
                    {{Session::get('success')}}
                </div>
            @endif
    @endsection

    @section('content')
    </h1>
    <div class="login-form">
        <div>
        <h2>Login Here</h2> <!-- Added heading -->
        <form action="/login" method="POST">
            @csrf
            <div>
                <input type="text" name="username" placeholder="Enter username">
            </div>
            <div>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <div>
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <p style="text-align: center;">Don't have an account? <a href="/signup">Signup</a></p>
        </div>
    </div>
     @endsection 
</body>
</html>