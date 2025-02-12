<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;
use App\Models\Content;

class SongController extends Controller
{
    // public function allSong(Request $request)
    public function allSong()

    {
        $songsWithContents = Song::with('contents')
            ->where('deleted', 0)
            ->orderBy('created_at', 'desc') // Sort by newest
            ->get();

        return view('menu')->with('songsWithContents', $songsWithContents);
    }

    public function allSongLearner(Request $request)
    {
        $songsWithContents = Song::with('contents')
            ->where('deleted', 0)
            ->orderBy('created_at', 'desc') // Sort by newest
            ->get();

        return view('session-5')->with('songsWithContents', $songsWithContents);
    }


    public function addSong(Request $request)
    {
        // Validate the form data 
        $validatedData = $request->validate([
            'songTitle' => 'required|string|max:255',
            'songAlbum' => 'required|string|max:255',
            'part' => 'required|array',
            'content' => 'required|array',
        ]);

        // Insert to SONG
        $song = new Song();
        $song->title = $validatedData['songTitle'];
        $song->album = $validatedData['songAlbum'];
        $song->save();

        // Insert to CONTENT
        if (count($validatedData['part']) === count($validatedData['content'])) {
            foreach ($validatedData['part'] as $key => $part) {
                // Create a new content record
                $content = new Content();
                $content->part = $part;
                $content->content = $validatedData['content'][$key];
                // Associate the content with the song
                $content->song_id = $song->id;
                $content->save();
            }
        } else {
            // Cancel the insert query
            return redirect()->back()->with('songEntryError', 'Number of parts and contents does not match.');
        }

        // Redirect back with success message
        return redirect()->route('menu')->with('songSaved', 'Song added successfully!');
    }

    public function editSong($id)
    {
        $song = Song::with('contents')->findOrFail($id);
        // dump($song);
        return view('edit-song', compact('song'));
    }

    public function viewSong($id)
    {
        $song = Song::with('contents')->findOrFail($id);
        // dump($song);
        return view('view-song', compact('song'));
    }

    public function deleteSong(Request $request, $id)
    {
        $song = Song::findOrFail($id);

        $song->deleted = 1;
        $song->save();

        $song->contents()->update(['deleted' => 1]);

        return redirect()->route('menu')->with('songDeleted', 'Song deleted successfully!');
    }

    public function updateSong(Request $request, $id)
    {
        // Find the song by its ID
        $song = Song::findOrFail($id);

        // Update title and album
        $song->title = $request->input('songTitle');
        $song->album = $request->input('songAlbum');
        $song->save();

        // Update each content associated with song
        foreach ($song->contents as $index => $content) {
            $content->part = $request->input('part')[$index];
            $content->content = $request->input('content')[$index];
            $content->save();
        }

        return redirect()->route('menu')->with('songUpdated', 'Song updated successfully!');
    }
}
