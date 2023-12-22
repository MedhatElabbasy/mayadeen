<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- css files-->
    <link rel="stylesheet" href="{{ asset('assets/app/story/css/story.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/story/css/global-style.css') }}" />
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <title>القصة</title>
</head>

<body>
    <div class="first-page-container">
        <img class="story-img" src="{{ asset('assets/app/story/imges/story-img.svg') }}" alt="" />
        <h2 class="story-title">الأقصوصه</h2>
        <div class="img-btn">
            <img src="{{ asset('assets/app/story/imges/start-btn.svg') }}" alt="" />
            <a href="{{ route('supervisor.story.index') }}">
                <h2>البدايه</h2>
            </a>
        </div>
    </div>

    <!-- bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
