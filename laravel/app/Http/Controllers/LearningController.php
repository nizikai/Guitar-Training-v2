<?php

namespace App\Http\Controllers;

use App\Models\Learner;

use Illuminate\Http\Request;
use App\Http\Requests\AddLearnerRequest;

class LearningController extends Controller
{
    //insert new learner
    public function addLearner(AddLearnerRequest $request)
    {
        // Validate the incoming request data
        $request->validate([
            'learnerEmail' => 'required|email',
            'learnerPassword' => 'required|min:6',
        ]);

        // Create a new Learner instance and save it to the database
        $learner = new Learner();
        $learner->email = $request->input('learnerEmail');
        $learner->password = bcrypt($request->input('learnerPassword'));
        $learner->checkpoint = 0;
        $learner->save();

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Successfully added new learner');
    }

    public function checkLearningProgress($href)
    {
        // Get the session number from the href link
        $destination = $href;

        // Get the current learner's checkpoint
        $checkpoint = Learner::where('email', session('user_email'))->first()->checkpoint;

        // dump($checkpoint);
        // Return the view with the checkpoint
        return view($destination)->with('checkpoint', $checkpoint);
    }

    public function setLearningProgress($href, $currentCheckpoint, $newCheckpoint)
    {
        // Get the session number from the href link
        $destination = $href;

        // Get the current learner's checkpoint
        $learner = Learner::where('email', session('user_email'))->first();

        // Check if learner exists
        if ($learner) {
            // Set the current learner's checkpoint if condition is met
            if ($learner && $learner->checkpoint <= $currentCheckpoint) {
                $learner->checkpoint = $newCheckpoint;
                $learner->save();
                return redirect()->route($href)->with('New progress set.', 'Updated learning progress');
            } else {
                return redirect()->route($href)->with('sessionDone', 'You have already finished this story lesson.');
            }
        }
        else{
            // Handle case when learner is not found
            return redirect()->route('login')->with('error', 'Learner not found.');
        }
    }

    public function setLearningProgress1($href)
    {
        return $this->setLearningProgress($href, 0, 1);
    }

    public function setLearningProgress2($href)
    {
        return $this->setLearningProgress($href, 1, 2);
    }

    public function setLearningProgress3($href)
    {
        return $this->setLearningProgress($href, 2, 3);
    }

    public function setLearningProgress4($href)
    {
        return $this->setLearningProgress($href, 3, 4);
    }

    public function setLearningProgress5($href)
    {
        return $this->setLearningProgress($href, 4, 5);
    }

    public function setLearningProgress6($href)
    {
        return $this->setLearningProgress($href, 5, 6);
    }

    public function setLearningProgress7($href)
    {
        return $this->setLearningProgress($href, 6, 7);
    }

    public function setLearningProgress8($href)
    {
        return $this->setLearningProgress($href, 7, 8);
    }

    public function setLearningProgress9($href)
    {
        return $this->setLearningProgress($href, 8, 9);
    }

    public function setLearningProgress10($href)
    {
        return $this->setLearningProgress($href, 9, 10);
    }

    public function setLearningProgress11($href)
    {
        return $this->setLearningProgress($href, 10, 11);
    }

    public function setLearningProgress12($href)
    {
        return $this->setLearningProgress($href, 11, 12);
    }

    public function setLearningProgress13($href)
    {
        return $this->setLearningProgress($href, 12, 13);
    }

    public function setLearningProgress14($href)
    {
        return $this->setLearningProgress($href, 13, 14);
    }

    public function setLearningProgress15($href)
    {
        return $this->setLearningProgress($href, 14, 15);
    }

    public function setLearningProgress16($href)
    {
        return $this->setLearningProgress($href, 15, 16);
    }

    public function setLearningProgress17($href)
    {
        return $this->setLearningProgress($href, 16, 17);
    }

    public function setLearningProgress18($href)
    {
        return $this->setLearningProgress($href, 17, 18);
    }

    public function setLearningProgress19($href)
    {
        return $this->setLearningProgress($href, 18, 19);
    }
}
