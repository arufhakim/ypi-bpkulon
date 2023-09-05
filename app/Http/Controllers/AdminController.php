<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\AdminRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminController
{
    public function index()
    {
        return view('admin.index', [
            'user' => User::all(),
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(AdminRequest $request, User $user)
    {
        $attr = $request->all();
        $attr['password'] = Hash::make($request->passwordBaru);
        $attr['remember_token'] = Str::random(60);

        $user->update($attr);

        return redirect('/home')->with('success', 'Data Pribadi Berhasil DiUbah!');;
    }
}
