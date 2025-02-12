<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <title>Add New Learner</title>
    <style>
        .toggle-password {
            color: #007BFF;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div>
        <a href="/menu">
            <img src="..\assets\CloseButton.png" alt="" class="backButton z-10 w-10 h-10">
        </a>
        <div class="spacer"></div>
        <form action="{{ route('add-learner') }}" method="POST" id="songForm">
            @csrf
            <div id="songField">
                <div>
                    <label for="learnerEmail">Email Pelajar</label>
                    <br>
                    <input type="text" class="" name="learnerEmail" placeholder="Masukkan Email Pelajar">
                    @error('learnerEmail')
                        <span class="text-red-500" id="learnerError">{{ $message }}</span>
                    @enderror
                    <br>
                    <label for="learnerPassword">Password Pelajar</label>
                    <br>
                    <div class="password-input-container">
                        <input type="password" name="learnerPassword" id="learnerPassword" placeholder="Masukkan Password Pelajar">
                        <span id="togglePasswordText" class="toggle-password">Show Password</span>
                    </div>
                    @error('learnerPassword')
                        <span class="text-red-500" id="learnerError">{{ $message }}</span>
                    @enderror
                
                    <button type="submit" class="buttonLong">Tambahkan Pelajar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("togglePasswordText").addEventListener("click", function() {
            const passwordInput = document.getElementById("learnerPassword");
            const toggleText = document.getElementById("togglePasswordText");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleText.textContent = "Hide Password";
            } else {
                passwordInput.type = "password";
                toggleText.textContent = "Show Password";
            }
        });
    </script>

</body>

</html>
