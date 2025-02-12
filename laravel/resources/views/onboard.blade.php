<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#040404">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>GMS Guitar Training</title>
</head>

<body>

    <div>
        <img src="..\assets\GuitarTrainingLogo.png" alt="" id="guitartrainingLogo">
        <img src="..\assets\GMSLiveLogo.png" alt="" id="gmsliveOnboardLogo">

        <div class="background">
            <img src="..\assets\Onboard.png" alt="">
        </div>
    </div>

    {{-- Redirect Function --}}
    <script>
        function redirect() {
            window.location.href = 'login';
        }
        setTimeout(redirect, 500);
    </script>

</body>

</html>
