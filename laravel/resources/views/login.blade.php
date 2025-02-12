<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#040404">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <title>Login</title>
</head>

<body>

    <div>
        <img src="..\assets\GMSLiveLogo.png" alt="" id="gmsliveLoginLogo">

        <form action="{{ route('auth') }}" method="POST">
            @csrf
            <div class="content flex items-center" id="login">

                <div class="place-self-between">

                    <label for="email">
                        Email
                    </label>
                    <br>
                    <input type="text" class="" name="email" placeholder="Masukkan Email">

                    <label for="password">
                        Password
                    </label>
                    <br>
                    <input type="password" name="password" placeholder="Masukkan Password">

                    @if(session('error'))
                        <p id="loginError">{{ session('error') }}</p>
                    @endif

                    <button type="submit" class="buttonLong">Masuk</button>

                </div>
            </div>
        </form>

        <div class="background">
            <img src="..\assets\Login.png" alt="">
        </div>

    </div>

</body>

</html>
