<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
    <title>Edit Song</title>
</head>

<body>
    <a href="/menu">
        <img src="..\assets\CloseButton.png" alt="" class="backButton z-10 w-10 h-10">
    </a>
    <div class="spacer"></div>
    <div>
        <form action="{{ route('update-song', ['id' => $song->id]) }}" method="POST" id="songForm">
            @csrf
            <div id="songField">
                <div class="place-self-between">

                    <label for="songTitle">
                        Judul Lagu
                    </label>
                    <br>
                    <input type="text" class="" name="songTitle" placeholder="Masukkan Judul Lagu"
                        value="{{ $song->title ?? '' }}">

                    <label for="songAlbum">
                        Nama Album
                    </label>
                    <br>
                    <input type="text" name="songAlbum" placeholder="Masukkan Nama Album"
                        value="{{ $song->album ?? '' }}">

                    {{-- {{ $song->content ?? '' }} --}}

                    <label for="part">
                        Chord dan Lirik
                    </label>

                    @foreach ($song->contents as $content)
                        {{-- for debug purposes --}}
                        {{-- <p>{{ $content->part }}:</p> --}}

                        <select name="part[]">
                            <option value="Intro" {{ $content->part == 'Intro' ? 'selected' : '' }}>Intro</option>
                            <option value="Verse" {{ $content->part == 'Verse' ? 'selected' : '' }}>Verse</option>
                            <option value="Pre-Chorus" {{ $content->part == 'Pre-Chorus' ? 'selected' : '' }}>Pre-Chorus
                            </option>
                            <option value="Chorus" {{ $content->part == 'Chorus' ? 'selected' : '' }}>Chorus</option>
                            <option value="Bridge" {{ $content->part == 'Bridge' ? 'selected' : '' }}>Bridge</option>
                            <option value="Interlude" {{ $content->part == 'Interlude' ? 'selected' : '' }}>Interlude
                            </option>
                            <option value="Outro" {{ $content->part == 'Outro' ? 'selected' : '' }}>Outro</option>
                        </select>

                        {{-- for debug purposes --}}
                        {{-- <p>{{ $content->content }}</p> --}}

                        <textarea name="content[]" class="largeInput">{{ $content->content }}</textarea>
                    @endforeach

                    <button type="submit" class="updateButton">Simpan Lagu</button>

                </div>
            </div>
        </form>

        <form action="{{ route('delete-song', ['id' => $song->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="delete_status" value="1">
            <button type="submit" class="deleteButton" onclick="return confirmDelete()">Hapus Lagu</button>
        </form>
        

    </div>

    <script>
        // set initial section order
        function confirmDelete() {
        return confirm("Are you sure you want to delete this song?");
    }

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
