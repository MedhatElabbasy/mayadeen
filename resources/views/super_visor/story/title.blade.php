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
    <link rel="stylesheet" href="{{ asset('assets/app/story/css/story-title.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/story/css/write-story.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/story/css/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/app/story/css/writers.css') }}" />
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>عنوان القصة</title>
</head>

<body>
    <form action="" id="regForm">
        <div class="tab container-story-name">
            <div class="story-title-container">
                <img src="{{ asset('assets/app/story/imges/story-title.svg') }}" alt=""
                    class="story-title-img" />
                <input type="text" name="story-title" />
            </div>
        </div>

        <div class="tab container-story-name">
            <div class="write-story-container">
                <span>اكتب القصه</span>
                <div class="input-container">
                    <img class="write-story-img" src="{{ asset('assets/app/story/imges/Path 115.svg') }}"
                        alt="" />
                    <textarea></textarea>
                </div>
            </div>
        </div>

        <div class="tab container-story-name">
            <div class="writers-container">
                <div class="writer-container">
                    <img src="{{ asset('assets/app/story/imges/first-writer.svg') }}" alt="" />
                    <input type="text" />
                    <input type="number" />
                    <input type="email" />
                </div>
            </div>
        </div>
        <div class="tab container-story-name">
            <div class="writers-container">
                <div class="writer-container">
                    <img src="{{ asset('assets/app/story/imges/second-writer.svg') }}" alt="" />
                    <input type="text" />
                    <input type="number" />
                    <input type="email" />
                </div>
            </div>
        </div>
        <div class="tab container-story-name">
            <div class="writers-container">
                <div class="writer-container">
                    <img src="{{ asset('assets/app/story/imges/third-writer.svg') }}" alt="" />
                    <input type="text" />
                    <input type="number" />
                    <input type="email" />
                </div>
            </div>
        </div>
        </div>

        <div class="d-flex justify-content-evenly">
            <div class="img-btn mt-3">
                <img src="{{ asset('assets/app/story/imges/start-btn.svg') }}" alt="" />
                <button type="button" onclick="nextPrev(1)" id="nextBtn" class="button-form">
                    التالي
                </button>
            </div>
            <div class="img-btn mt-3" id="prevBtn">
                <img src="{{ asset('assets/app/story/imges/start-btn.svg') }}" alt="" />
                <button type="button" onclick="nextPrev(-1)" class="button-form">
                    السابق
                </button>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <div class="styling-footer">
        <img src="{{ asset('assets/app/story/imges/Group 33.svg') }}" alt="" />
        <img src="{{ asset('assets/app/story/imges/Group 33.svg') }}" alt="" />
    </div>

    <script src="{{ asset('assets/app/story/script.js') }}"></script>
</body>

</html>
