<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Cari Lagu</title>
</head>

<body>

    <a href="/training">
        <img src="..\assets\CloseButton.png" alt="" class="backButton w-10 h-10">
    </a>
    <div class="spacer"></div>

    <div>
        {{-- <img src="..\assets\GMSLiveLogoLargeBlack.png" alt="" id="GMSLiveLogoLargeBlack"> --}}

        <input type="text" class="searchBar" name="search" id="searchInput" oninput="search()"
            placeholder="Cari Judul, Album atau Lirik Lagu">

        <div id="searchResults">
            @foreach ($songsWithContents as $song)
                <div class="songContainerLearner">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                            <a href="{{ route('view-song', ['id' => $song->id]) }}">
                                <p class="songTitleLearner">{{ $song->title }}</p>
                                <p class="songAlbumLearner">{{ $song->album }}</p>
                            </a>
                            @foreach ($song->contents as $content)
                                <input type="hidden" class="songContent" value="{{ $content->content }}">
                            @endforeach
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach

        </div>

    </div>

    <script>
        //search functionality
        function search() {
            // convert to lowercase for case insensitive search
            var input = document.getElementById("searchInput").value.toLowerCase();
            var songs = document.getElementsByClassName("songContainerLearner");

            //loop all cointainer
            for (var i = 0; i < songs.length; i++) {
                var title = songs[i].getElementsByClassName("songTitleLearner")[0].textContent.toLowerCase();
                var album = songs[i].getElementsByClassName("songAlbumLearner")[0].textContent.toLowerCase();
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
