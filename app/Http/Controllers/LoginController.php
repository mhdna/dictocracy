<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $validator = $request->$validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
    
}
