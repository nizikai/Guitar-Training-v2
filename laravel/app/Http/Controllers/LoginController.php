<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Learner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        // Get the email and password from the request
        $email = $request->input('email');
        $password = $request->input('password');

        // Check if the email is registered in the Admin table
        $admin = Admin::where('email', $email)->first();

        if ($admin && password_verify($password, $admin->password)) {
            //clear session first
            Session::flush();

            // Set session for admin
            Session::put('user_type', 'admin');
            Session::put('user_id', $admin->id);
            Session::put('user_email', $admin->email);
            return redirect()->route('menu');
        }

        // Check if the email is registered in the Learner table
        $learner = Learner::where('email', $email)->first();

        if ($learner && password_verify($password, $learner->password)) {
            //clear session first
            Session::flush();

            // Set session for learner
            Session::put('user_type', 'learner');
            Session::put('user_id', $learner->id);
            Session::put('user_email', $learner->email);
            return redirect()->route('training');
        }

        // If credentials do not match, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
