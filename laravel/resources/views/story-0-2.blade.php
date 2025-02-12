<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Mengenali Bagian Gitar</title>
</head>

<body>

    <div class="storyHeader">
            <img src="..\assets\GMSLiveLogoSmall.png" alt="" class="z-10 fixed w-10 mt-8 ml-4">

            <div class="storyLabel truncate leading-4 z-10 mt-9 ml-16">
                The Introduction
                <strong>
                    <br>Mengenali Bagian Gitar
                </strong>
            </div>
        </div>
    </div>

    <a href="/session-0-set-2">
        <img src="..\assets\CloseStory.png" alt="" class="closeStory z-10 w-6 h-6">
    </a>

    <div class="story">

        <div data-slide="slide" class="slide">
            <div class="slide-items">
                <img src="..\assets\Story0-2-1.jpg" alt="">
                <img src="..\assets\Story0-2-2.jpg" alt="">
                <img src="..\assets\Story0-2-3.jpg" alt="">
                <img src="..\assets\Story0-2-4.jpg" alt="">
                <img src="..\assets\Story0-2-5.jpg" alt="">
            </div>

            <nav class="slide-nav">
                <div class="slide-thumb"></div>
                <button class="slide-prev">Previous</button>
                <button class="slide-next">Next</button>
            </nav>

        </div>
    </div>

    <script src="{{ asset('js/story-light.js') }}"></script>

</body>

</html>
