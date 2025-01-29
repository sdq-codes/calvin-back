<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();

        return view('users.index', compact('users'));
    }

public function edit(User $user)
    {
        // Return the edit view with the user data
        return view('users.edit', compact('user'));
    }

    // Update the user data
    public function update(Request $request, User $user)
    {
        // Validate the input data
        $validated = $request->validate([
            'spot_usd' => 'required|numeric',
            'spot_percentage' => 'required|numeric',
            'margin_usd' => 'required|numeric',
            'margin_percentage' => 'required|numeric',
            'futures_usd' => 'required|numeric',
            'futures_percentage' => 'required|numeric',
            'buy_sell_usd' => 'required|numeric',
            'buy_sell_percentage' => 'required|numeric',
        ]);

        // Update the user with the validated data
        $user->update($validated);

        // Redirect back to the user table or to a success page
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
}
