<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $f = $request->validate([

            'email' => ['required'],
            'password' => ['required']

        ]);
        //try lo login

        if (Auth::attempt($f, $request->remember)) {
            return redirect()->intended();
        } else {
            return back()->withErrors(['failed' => 'Invalid credentials provided!!!'])->withInput($request->only('email'));
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
