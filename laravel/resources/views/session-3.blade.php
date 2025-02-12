<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000812">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Session 3</title>
</head>

<body>

    <a href="/training">
        <img src="..\assets\CloseButton.png" alt="" class="closeSession z-10 w-10 h-10">
    </a>

    <div class="sessionHeader absolute">

        <img src="..\assets\Class.png" alt="" class="-z-1 absolute" id="sessionBackground">

        <div class="absolute z-1">
            <div class="sessionTitle">
                Sesi 3
            </div>
            <div class="sessionSubtitle leading-3 text-sm">
                Mempelajari memainkan Chord F dan Dm
            </div>
        </div>
    </div>

    <br>

    <div class="flex flex-col items-center">

        <br>
        <a href="/story-3-1" @if ($checkpoint < 12) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 12)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 12)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 12)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Cara memainkan
            <br>Chord F
        </div>
        <br>

        <br>
        <a href="/learn-f" @if ($checkpoint < 13) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 13)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 13)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 13)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Training memainkan 
            <br>Chord F
        </div>
        <br>

        <br>
        <a href="/story-3-2" @if ($checkpoint < 14) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 14)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 14)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 14)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Cara memainkan
            <br>Chord Dm
        </div>
        <br>

        <br>
        <a href="/learn-dm" @if ($checkpoint < 15) onclick="alert('Pelajari materi sebelumnya terlebih dahulu.'); return false;" @endif>
            <div class="relative">
                <img src="..\assets\Class0-1.png" alt="" class="sessionStoryPicture">
                @if ($checkpoint >= 15)
                    <img src="..\assets\ClassAvailable.png" alt=""
                        class="classBanner z-1 absolute top-0 left-0">
                @endif
                @if ($checkpoint > 15)
                    <img src="..\assets\ClassFinished.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Checkmark.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
                @if ($checkpoint < 15)
                    <img src="..\assets\ClassLocked.png" alt="" class="classBanner z-1 absolute top-0 left-0">
                    <img src="..\assets\Locked.png" alt="" class="checkmark z-2 absolute bottom-0 right-0">
                @endif
            </div>
        </a>
        <div class="sessionStoryLabel leading-4 text-center">
            Training memainkan 
            <br>Chord Dm
        </div>
        <br>

    </div>

    <div class="spacer"></div>

</body>

</html>
