<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Admin Menu GMS Guitar Training</title>
</head>

<body>
    <div>

        @if (session('songSaved'))
            <img src="..\assets\songSavedSuccess.jpg" alt="" class="songSavedSuccess" id="successImage">
        @endif

        @if (session('songDeleted'))
            <img src="..\assets\songDeletedSuccess.jpg" alt="" class="songSavedSuccess" id="successImage">
        @endif

        @if (session('songUpdated'))
            <img src="..\assets\songUpdatedSuccess.jpg" alt="" class="songSavedSuccess" id="successImage">
        @endif

        <img src="..\assets\GuitarTrainingBlack.png" alt="" id="guitartrainingMenuLogo">

        <button type="submit" onclick="window.location.href='/learner-field'" id="addButton">
            <div class="flex flex-row justify-left">
                <img src="..\assets\AddLearner.png" alt="" id="plusIcon">
                Tambahkan Pelajar
            </div>
        </button>

        <button type="submit" onclick="window.location.href='/song-field'" id="addButton">
            <div class="flex flex-row justify-left">
                <img src="..\assets\Plus.png" alt="" id="plusIcon">
                Tambahkan Lagu
            </div>
        </button>

        <input type="text" class="searchBar" name="search" id="searchInput" oninput="search()"
            placeholder="Cari Judul atau Lirik Lagu">

        <div id="searchResults">
            @foreach ($songsWithContents as $song)
                <div class="songContainer">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <a href="{{ route('view-song', ['id' => $song->id]) }}">
                                <p class="songTitle">{{ $song->title }}</p>
                                <p class="songAlbum">{{ $song->album }}</p>
                            </a>
                            @foreach ($song->contents as $content)
                                <input type="hidden" class="songContent" value="{{ $content->content }}">
                            @endforeach
                        </div>
                        <a href="{{ route('edit-song', ['id' => $song->id]) }}">
                            <img src="..\assets\EditButton.png" alt="" class="editButton">
                        </a>
                    </div>
                    <hr>
                </div>
            @endforeach

        </div>

    </div>

    <script>
        //success message
        const successImage = document.getElementById('successImage');
        if (successImage) {
            setTimeout(() => {
                successImage.style.display = 'none';
            }, 1000);
        }

        //search functionality
        function search() {
            // convert to lowercase for case insensitive search
            var input = document.getElementById("searchInput").value.toLowerCase();
            var songs = document.getElementsByClassName("songContainer");

            //loop all cointainer
            for (var i = 0; i < songs.length; i++) {
                var title = songs[i].getElementsByClassName("songTitle")[0].textContent.toLowerCase();
                var album = songs[i].getElementsByClassName("songAlbum")[0].textContent.toLowerCase();
                var contentInputs = songs[i].getElementsByClassName("songContent");

                var contentFound = false;
                //search for content
                for (var j = 0; j < contentInputs.length; j++) {
                    var content = contentInputs[j].value.toLowerCase();
                    if (content.includes(input)) {
                        contentFound = true;
                        break;
                    }
                }

                //display spesificly found songContainer
                if (title.includes(input) || album.includes(input) || contentFound) {
                    //to make it visible
                    songs[i].style.display = "block";
                } else {
                    songs[i].style.display = "none";
                }
            }
        }
    </script>

</body>

</html>
