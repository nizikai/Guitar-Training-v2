<?php

use App\Http\Controllers\LearningController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('onboard');
});

// To display login page
Route::get('/login', function () {
    return view('login');
})->name('login');

// To run login auth logic
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');

// MARK: ADMIN

// To insert song with contents (chord and lyric) into the database
Route::post('/add-song', [SongController::class, 'addSong'])->name('add-song');

// To get all inserted song
// Route::get('/menu', [SongController::class, 'allSong'])->name('menu');
Route::get('/menu', function () {
    if (Session::get('user_type') !== 'admin') {
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
    return app(SongController::class)->allSong();
})->name('menu');

// To edit song details
Route::get('/edit-song/{id}', [SongController::class, 'editSong'])->name('edit-song');

// To delete song
Route::put('/delete-song/{id}', [SongController::class, 'deleteSong'])->name('delete-song');

// To update song
Route::post('/update-song/{id}', [SongController::class, 'updateSong'])->name('update-song');

// To view song details
Route::get('/view-song/{id}', [SongController::class, 'viewSong'])->name('view-song');

// To insert new learner
Route::post('/add-learner', [LearningController::class, 'addLearner'])->name('add-learner');

Route::get('/song-field', function () {
    if (Session::get('user_type') !== 'admin') {
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
    return view('song-field');
});

Route::get('/learner-field', function () {
    if (Session::get('user_type') !== 'admin') {
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
    return view('learner-field');
});

// MARK: LEARNER

Route::get('/reminder', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('reminder');
});

Route::get('/sound-test', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('sound-test');
});

Route::get('/training', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->checkLearningProgress('training');
})->name('training');

// MARK: INTRODUCTION

Route::get('/session-0', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->checkLearningProgress('session-0');
})->name('session-0');

Route::get('/session-0-set-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress1('session-0');
});

Route::get('/session-0-set-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress2('session-0');
});

Route::get('/session-0-set-3', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress3('session-0');
});

Route::get('/session-0-set-4', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress4('session-0');
});


// MARK: SESSION 1

Route::get('/session-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->checkLearningProgress('session-1');
})->name('session-1');

Route::get('/session-1-set-5', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress5('session-1');
});

Route::get('/session-1-set-6', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress6('session-1');
});

Route::get('/session-1-set-7', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress7('session-1');
});

Route::get('/session-1-set-8', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress8('session-1');
});


// MARK: SESSION 2

Route::get('/session-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->checkLearningProgress('session-2');
})->name('session-2');

Route::get('/session-2-set-9', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress9('session-2');
});

Route::get('/session-2-set-10', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress10('session-2');
});

Route::get('/session-2-set-11', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress11('session-2');
});

Route::get('/session-2-set-12', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress12('session-2');
});


// MARK: SESSION 3

Route::get('/session-3', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->checkLearningProgress('session-3');
})->name('session-3');

Route::get('/session-3-set-13', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress13('session-3');
});

Route::get('/session-3-set-14', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress14('session-3');
});

Route::get('/session-3-set-15', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress15('session-3');
});

Route::get('/session-3-set-16', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress16('session-3');
});


// MARK: SESSION 4

Route::get('/session-4', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->checkLearningProgress('session-4');
})->name('session-4');

Route::get('/session-4-set-17', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress17('session-4');
});

Route::get('/session-4-set-18', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress18('session-4');
});

Route::get('/session-4-set-19', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return app(LearningController::class)->setLearningProgress19('session-4');
});


Route::get('/story-0-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-0-1');
});

Route::get('/story-0-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-0-2');
});

Route::get('/story-0-3', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-0-3');
});

Route::get('/story-0-4', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-0-4');
});

Route::get('/story-1-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-1-1');
});

Route::get('/story-1-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-1-2');
});

Route::get('/story-2-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-2-1');
});

Route::get('/story-2-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-2-2');
});

Route::get('/story-3-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-3-1');
});

Route::get('/story-3-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-3-2');
});

Route::get('/story-4-1', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-4-1');
});

Route::get('/story-4-2', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-4-2');
});

Route::get('/story-4-3', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('story-4-3');
});

Route::get('/learn-c', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('learn-c');
});

Route::get('/learn-g', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('learn-g');
});

Route::get('/learn-em', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('learn-em');
});

Route::get('/learn-am', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('learn-am');
});

Route::get('/learn-f', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('learn-f');
});

Route::get('/learn-dm', function () {
    if (Session::get('user_type') !== 'learner') {
        return redirect()->route('login')->with('error', 'Must login as learner.');
    }
    return view('learn-dm');
});

Route::get('/session-5', [SongController::class, 'allSongLearner'])->name('session-5');