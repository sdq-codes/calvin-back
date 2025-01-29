<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Blade view for login form
    }

    // Handle login attempt
    public function login(Request $request)
    {
        // Validate the incoming login credentials
        $validated = $request->validate([
            'email' => ['required', 'email', 'in:admin1342@calvin.test'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (Auth::attempt($validated)) {
            // Authentication passed, redirect to the intended page or home
            return redirect()->route('users.index');
        }

        // If authentication fails, redirect back with error message
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect the user after logging out
        return redirect('/login');
    }
}
