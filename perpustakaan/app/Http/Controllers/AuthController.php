<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        dd('BERHASIL LOGIN', $user); // sementara

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'mahasiswa') {
            return redirect('/mahasiswa/dashboard');
        }
    }

    return redirect('/login')->with('error', 'Email atau password salah');
}



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
