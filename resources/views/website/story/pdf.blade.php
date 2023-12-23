<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ $story->title }}</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
        }
    </style>
</head>
<body>
    <h1>{{ $story->title }}</h1>
    <p>{!! nl2br(e($story->content)) !!}</p>
</body>
</html>
