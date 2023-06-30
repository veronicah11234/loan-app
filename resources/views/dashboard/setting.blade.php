<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <h1>Settings</h1>

    <form action="/save_settings" method="POST">
        @csrf

        <label for="site_name">Site Name:</label>
        <input type="text" id="site_name" name="site_name" value="{{ $settings->site_name }}" required><br>

        <label for="site_email">Site Email:</label>
        <input type="email" id="site_email" name="site_email" value="{{ $settings->site_email }}" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="{{ $settings->contact_number }}" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required>{{ $settings->address }}</textarea><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
