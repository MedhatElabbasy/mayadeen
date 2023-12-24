<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .success-container {
            text-align: center;
        }

        .success-icon {
            color: #28a745;
            /* Green color for success */
            font-size: 48px;
            margin-bottom: 20px;
        }

        .success-message {
            font-size: 24px;
            color: #28a745;
        }
    </style>
    <title> تم بنجاح </title>
</head>

<body>
    <div class="success-container">
        <div class="success-icon">&#10004;</div>
        <div class="success-message">تم ارسال الاقصوصة الي البريد الالكتروني لكل من
            <br>
            {{ auth()->user()->name }}
            <br>
            {{ session('w1_name') }}
            <br>
            {{ session('w2_name') }}
            <br>
            {{ session('w3_name') }}

        </div>
    </div>
</body>

</html>
