<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#040404">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Reminder</title>
</head>

<body>

    <div>

        <div class="content flex items-center" id="reminder">

            <div class="place-self-between">

                <div class="textContent primary m-5vw leading-7">
                    Berlatih selama <br>
                    <div class="bold">15 menit</div>
                    setiap hari akan <br>
                    memperkuat jari Anda.
                </div>

                <div class="textContent secondary m-5vw leading-5 mt-6">
                    Rasa sakit yang dirasakan saat<br>
                    awal belajar adalah hal yang wajar<br>
                    dan akan segera mereda.
                </div>

                <div class="spacer"> </div>

                <a href="/training">
                    <button type="submit" onclick="window.location.href='/menu'" class="buttonLong">Lanjut</button>
                </a>

                <div class="spacer"> </div>

            </div>

        </div>

        <div class="background">
            <img src="..\assets\Reminder.png" alt="">
        </div>

    </div>

</body>

</html>
