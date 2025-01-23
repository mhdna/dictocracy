<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(string $user_id)
    {
        $user = User::findOrFail($user_id);
        return view('profile', [
            'user' => $user
        ]);
    }

    public function account()
    {
        $user = auth()->user();

        return view('account', [
            'user' => $user
        ]);
    }
}
