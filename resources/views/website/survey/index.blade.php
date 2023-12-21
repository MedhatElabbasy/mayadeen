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
    <link rel="stylesheet" href="{{ asset('website/css/poll-quesition.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/story-title.css') }}" />

    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>Challenge yourself</title>
</head>

<body>
    <img class="story-img" src="{{ asset('website/imges/story-img.svg') }}" alt="" />
    <form action="{{ route('users.survey.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="tab poll-quesition-container">
            <img src="{{ asset('website/imges/Path 115.svg') }}" alt="" />

            <div class="title-container">
                <div class="img-btn-container">
                    <img class="red-small-btn" src="{{ asset('website/imges/red-small-btn.svg') }}" alt="" />
                    <a href="#" onclick="showQuestions()">
                        <h2>شاركنا تجربتك</h2>
                    </a>
                </div>
            </div>

            @include('website.survey.questions')
        </div>
        <div class="tab personal-info-container">
            <img class="personal-info-img" src="{{ asset('website/imges/personal-info.svg') }}" alt="" />
            <input type="text" name="name" />
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="number" name= "phone" />
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email" name="email"/>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-evenly">
            <div class="img-btn mt-3">
                <img src="{{ asset('website/imges/start-btn.svg') }}" alt="" />
                <button type="button" onclick="nextPrev(1)" id="nextBtn" class="button-form d-none">
                    التالي
                </button>
                <button type="submit" class="button-form d-none" id="submitBtn">
                    ارسال
                </button>
            </div>
            <div class="img-btn mt-3" id="prevBtn">
                <img src="{{ asset('website/imges/start-btn.svg') }}" alt="" />
                <button type="button" onclick="nextPrev(-1)" class="button-form">
                    السابق
                </button>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px">
            <span class="step"></span>
        </div>
    </form>
    <!-- footer -->
    <div class="styling-footer">
        <img src="{{ asset('website/imges/Group 33.svg') }}" alt="" />
        <img src="{{ asset('website/imges/Group 33.svg') }}" alt="" />
    </div>

    <script src="{{ asset('website/js/script.js') }}"></script>
    <script>
        function showQuestions(){
            document.querySelector('.questions-container').classList.remove('d-none');
            document.querySelector('.button-form').classList.remove('d-none');
        }
    </script>
</body>

</html>
