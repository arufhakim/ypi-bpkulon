<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember_me = $request->remember ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect('/home');
        } else {
            return redirect()->back()->with('failed', 'Username atau Password Tidak Sesuai!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
