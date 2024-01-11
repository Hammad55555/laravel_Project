<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form</h2>
    <form method="post" action="{{ route('postdata') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="f_name">Father's Name:</label>
        <input type="text" name="f_name" required>

        <label for="number">Number:</label>
        <input type="text" name="number" required>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea>

        <button type="submit" >Submit</button>
    </form>
</div>

</body>
</html>
