<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Training</title>
</head>

<body>

    <div class="title">
        Training
    </div>
    <div class="subtitle leading-3">
        Materi pembelajaran gitar
    </div>
    <br>

    <div class="flex flex-col" id="levelCard">
        <button id="btnSession0">
            <div id="cardContainer" class="flex flex-col">
                <div id="cardText">
                    <h1 id="cardTitle">
                        Pendahuluan
                    </h1>
                    <p id="cardSubtitle" class="leading-4 text-sm">
                        Tuning dan mengenali
                        <br>bagian gitar
                    </p>
                </div>
                <img src="..\assets\Card.png" alt="" class="-z-1">
                @if ($checkpoint >= 4)
                <img src="..\assets\DoneBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 4 && $checkpoint >= 0)
                    <img src="..\assets\NowBanner.png" alt="" class="z-2" id="cardBanner">
                @endif
            </div>
        </button>

        <button id="btnSession1">
            <div id="cardContainer" class="flex flex-col">
                <div id="cardText">
                    <h1 id="cardTitle">
                        Sesi 1
                    </h1>
                    <p id="cardSubtitle" class="leading-4 text-sm">
                        Mempelajari memainkan
                        <br>Chord C dan G
                    </p>
                </div>
                <img src="..\assets\Card.png" alt="" class="-z-1">
                @if ($checkpoint >= 8)
                <img src="..\assets\DoneBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 8 && $checkpoint >= 4)
                    <img src="..\assets\NowBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 4)
                    <img src="..\assets\LockedBanner.png" alt="" class="z-2" id="cardBanner">
                @endif
            </div>
        </button>

        <button id="btnSession2">
            <div id="cardContainer" class="flex flex-col">
                <div id="cardText">
                    <h1 id="cardTitle">
                        Sesi 2
                    </h1>
                    <p id="cardSubtitle" class="leading-4 text-sm">
                        Mempelajari memainkan
                        <br>Chord Em dan Am
                    </p>
                </div>
                <img src="..\assets\Card.png" alt="" class="-z-1">
                @if ($checkpoint >= 12)
                <img src="..\assets\DoneBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 12 && $checkpoint >= 8)
                    <img src="..\assets\NowBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 8)
                    <img src="..\assets\LockedBanner.png" alt="" class="z-2" id="cardBanner">
                @endif
            </div>
        </button>

        <button id="btnSession3">
            <div id="cardContainer" class="flex flex-col">
                <div id="cardText">
                    <h1 id="cardTitle">
                        Sesi 3
                    </h1>
                    <p id="cardSubtitle" class="leading-4 text-sm">
                        Mempelajari memainkan
                        <br>Chord F dan Dm
                    </p>
                </div>
                <img src="..\assets\Card.png" alt="" class="-z-1">
                @if ($checkpoint >= 16)
                <img src="..\assets\DoneBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 16 && $checkpoint >= 12)
                    <img src="..\assets\NowBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 12)
                    <img src="..\assets\LockedBanner.png" alt="" class="z-2" id="cardBanner">
                @endif
            </div>
        </button>

        <button id="btnSession4">
            <div id="cardContainer" class="flex flex-col">
                <div id="cardText">
                    <h1 id="cardTitle">
                        Sesi 4
                    </h1>
                    <p id="cardSubtitle" class="leading-4 text-sm">
                        Membaca Chord, Hand Signal,
                        <br>dan Open Worship
                    </p>
                </div>
                <img src="..\assets\Card.png" alt="" class="-z-1">
                @if ($checkpoint >= 19)
                <img src="..\assets\DoneBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 19 && $checkpoint >= 16)
                    <img src="..\assets\NowBanner.png" alt="" class="z-2" id="cardBanner">
                @elseif ($checkpoint < 16)
                    <img src="..\assets\LockedBanner.png" alt="" class="z-2" id="cardBanner">
                @endif
            </div>
        </button>

        <button id="btnSession5">
            <div id="cardContainer" class="flex flex-col">
                <div id="cardText">
                    <h1 id="cardTitle">
                        Lihat Chord
                    </h1>
                    <p id="cardSubtitle" class="leading-4 text-sm">
                        Lagu GMS Live
                        <br>beserta Chord-nya
                    </p>
                </div>
                <img src="..\assets\Card.png" alt="" class="-z-1">
                <img src="..\assets\SearchPill.png" alt="" class="z-2" id="cardBanner">
            </div>
        </button>

    </div>

    <script>
        // Replace this with the actual checkpoint value
        const checkpoint = {{ $checkpoint }};
        
        const buttons = [
            { id: 'btnSession0', min: 0, max: Infinity, link: '/session-0' },
            { id: 'btnSession1', min: 4, max: Infinity, link: '/session-1' },
            { id: 'btnSession2', min: 8, max: Infinity, link: '/session-2' },
            { id: 'btnSession3', min: 12, max: Infinity, link: '/session-3' },
            { id: 'btnSession4', min: 16, max: Infinity, link: '/session-4' },
            { id: 'btnSession5', min: 0, max: Infinity, link: '/session-5' } // Assuming btnSession5 is always clickable
        ];

        buttons.forEach(button => {
            const btnElement = document.getElementById(button.id);
            if (checkpoint >= button.min && checkpoint <= button.max) {
                btnElement.onclick = () => window.location.href = button.link;
            } else {
                btnElement.style.cursor = 'not-allowed';
                btnElement.onclick = () => alert('Pelajari sesi sebelumnya terlebih dahulu.');
            }
        });
    </script>
</body>

</html>
