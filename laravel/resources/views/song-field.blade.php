<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <title>Add New Song</title>
</head>

<body>

    <div>

        <a href="/menu">
            <img src="..\assets\CloseButton.png" alt="" class="backButton z-10 w-10 h-10">
        </a>
        <div class="spacer"></div>
        
        <form action="{{ route('add-song') }}" method="POST" id="songForm">
            @csrf
            <div id="songField">

                <div class="place-self-between">

                    <label for="songTitle">
                        Judul Lagu
                    </label>
                    <br>
                    <input type="text" class="" name="songTitle" placeholder="Masukkan Judul Lagu">

                    <label for="songAlbum">
                        Nama Album
                    </label>
                    <br>
                    <input type="text" name="songAlbum" placeholder="Masukkan Nama Album">

                    <label for="part">
                        Chord dan Lirik
                    </label>

                    <div id="songPartContainer">
                        {{-- Newly added section will spawn here --}}
                    </div>

                    <button type="button" onclick="addNewSection()" id="addSongSectionButton">
                        <div class="flex flex-row justify-center">
                            <img src="..\assets\PlusRound.png" alt="" id="plusIcon">
                            Tambahkan Bagian Lagu
                        </div>
                    </button>

                    <button type="submit" class="buttonLong">Simpan Lagu</button>

                </div>


            </div>
        </form>

    </div>

    <script>
        // to prevent 'enter' to submit the form
        // document.getElementById("songField").addEventListener("keydown", function(event) {
        //     if (event.key === "Enter") {
        //         event.preventDefault();
        //     }
        // });

        // set initial section order
        let sectionOrder = 1;

        function addNewSection() {
            var songPartContainer = document.getElementById('songPartContainer');

            // create a new div
            var newSection = document.createElement('div');
            newSection.className = 'songPartField';

            // create a label for the section order
            var sectionOrderLabel = document.createElement('span');
            sectionOrderLabel.textContent = 'Section Order: ' + sectionOrder;

            // create a new select element
            var newSelect = document.createElement('select');
            newSelect.name = 'part[]';
            var options = ["Intro", "Verse", "Pre-Chorus", "Chorus", "Bridge", "Interlude", "Outro"];
            for (var i = 0; i < options.length; i++) {
                var option = document.createElement('option');
                option.value = options[i];
                option.textContent = options[i];
                newSelect.appendChild(option);
            }

            // Create a new input element
            var newInput = document.createElement('textarea');
            // newInput.type = 'textarea';
            newInput.name = 'content[]';
            newInput.className = 'largeInput';
            newInput.placeholder = 'Masukkan Intro';

            // Add event listener to select element
            newSelect.addEventListener('change', function() {
                // Update placeholder based on selected option
                newInput.placeholder = 'Masukkan ' + this.value.toLowerCase();
            });

            // Append label, select, and input elements to the new section
            // newSection.appendChild(sectionOrderLabel);
            newSection.appendChild(newSelect);
            newSection.appendChild(newInput);

            // Assign order to the section and increment the order
            newSection.dataset.order = sectionOrder++;

            // Append the new section to the container
            songPartContainer.appendChild(newSection);
        }
    </script>


</body>

</html>
