<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <title>View Song Detail</title>

</head>

<body>
    @if (session('user_type') == 'admin')
        <a href="/menu">
            <img src="..\assets\CloseButton.png" alt="" class="backButton w-10 h-10">
        </a>
        <div class="spacer"></div>
    @endif

    @if (session('user_type') == 'learner')
        <a href="/session-5">
            <img src="..\assets\CloseButton.png" alt="" class="backButton w-10 h-10">
        </a>
        <div class="spacer"></div>
    @endif



    <div id="songField">
        <div id="viewSong">
            <div class="place-self-between">

                <div class="viewSongHeader">
                    <p class="songTitle">{{ $song->title ?? '' }}</p>
                    <p class="songAlbum">{{ $song->album ?? '' }}</p>
                </div>

                <!-- Transpose Button -->
                <div class="transposeContainer flex flex-row justify-between ml-5vw w-90vw">
                    <p id="transposeLabel">Key = C</p>
                    <button id="transposeButton" class="transpose-button" onclick="transposeSong()">Transpose ke D</button>
                </div>
                

                @foreach ($song->contents as $content)
                    <div class="songPartPills">
                        <p>{{ $content->part }}</p>
                    </div>

                    <div class="songContent">
                        @php
                            // Split the content by lines
                            $lines = explode("\n", $content->content);
                        @endphp

                        @foreach ($lines as $index => $line)
                            <p class="line-{{ $index % 2 === 0 ? 'even' : 'odd' }}">{{ $line }}</p>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        // Initial transpose setting
        let transposeToD = false;

        // Function to transpose the song
        function transposeSong() {
            transposeToD = !transposeToD; // Toggle transpose
            const transposeButton = document.getElementById('transposeButton');
            const transposeLabel = document.getElementById('transposeLabel');
            if (transposeToD) {
                transposeButton.innerText = 'Transpose ke C';
                transposeLabel.innerText = 'Key = D';
            } else {
                transposeButton.innerText = 'Transpose ke D';
                transposeLabel.innerText = 'Key = C';
            }
            transposeText();
        }

        // Function to transpose the entire song text
        function transposeText() {
            const songContent = document.querySelectorAll('.songContent p');
            songContent.forEach(line => {
                line.innerHTML = transposeChords(line.innerHTML);
            });
        }

        // Function to transpose chords in a line of text
        function transposeChords(line) {
            // Map of chord transposition from C to D
            const transposeMapToD = {
                'C': 'D',
                'Dm': 'Em',
                'Em': 'F#m',
                'F': 'G',
                'G': 'A',
                'Am': 'Bm',
                'Bm': 'C#m', // Added Bm to transpose to C#m
            };

            // Map of chord transposition from D to C (reverse of transposeMapToD)
            const transposeMapToC = {
                'D': 'C',
                'Em': 'Dm',
                'F#m': 'Em',
                'G': 'F',
                'A': 'G',
                'Bm': 'Am',
                'C#m': 'Bm', // Added C#m to transpose to Bm
            };

            // Choose the appropriate transpose map based on current setting
            const transposeMap = transposeToD ? transposeMapToD : transposeMapToC;

            // Split the line into words preserving the whitespace
            const words = line.split(/(\s+)/);

            // Transpose each word that matches a chord in the transposeMap
            const transposedWords = words.map(word => {
                // Check if the word is a chord or contains a chord followed by punctuation
                const chord = word.endsWith(':') ? word.slice(0, -1) : word;
                const transposedChord = transposeMap[chord];
                return transposedChord ? word.replace(chord, transposedChord) : word;
            });

            return transposedWords.join('');
        }
    </script>

</body>

</html>
