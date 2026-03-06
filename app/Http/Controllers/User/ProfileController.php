<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('User.profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Profil berhasil diperbarui');
    }
}