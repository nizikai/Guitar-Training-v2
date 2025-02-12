<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000812">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Session 2</title>
</head>

<body>

    <a href="/training">
        <img src="..\assets\CloseButton.png" alt="" class="closeSession z-10 w-10 h-10">
    </a>

    <div class="sessionHeader absolute">

        <img src="..\assets\Class.png" alt="" class="-z-1 absolute" id="sessionBackground">

        <div class="absolute z-1">
            <div class="sessionTitle">
                Sesi 2
            </div>
            <div class="sessionSubtitle leading-3 text-sm">
                Mempelajari memainkan Chord Em dan Am
            </div>
        </div>
    </div>

    <br>

    <div class="flex flex-col items-center">

        <br>
        <a href="/story-2-1" @if ($checkpoint < 8) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 8)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 8)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 8)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Cara memainkan
            <br>Chord Em
        </div>
        <br>

        <br>
        <a href="/learn-em" @if ($checkpoint < 9) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 9)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 9)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 9)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Training memainkan 
            <br>Chord Em
        </div>
        <br>

        <br>
        <a href="/story-2-2" @if ($checkpoint < 10) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 10)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 10)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 10)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Cara memainkan
            <br>Chord Am
        </div>
        <br>

        <br>
        <a href="/learn-am" @if ($checkpoint < 11) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 11)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 11)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 11)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Training memainkan 
            <br>Chord Am
        </div>
        <br>

    </div>

    <div class="spacer"></div>

</body>

</html>
