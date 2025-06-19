<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function formLogin() {
    return view('auth.login');
}

public function login(Request $request) {
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Email atau Password salah');
    }
    session(['user' => $user]);
    return $user->role === 'admin' ? redirect('/admin/dashboard') : redirect('/mahasiswa/dashboard');
}

public function logout() {
    session()->forget('user');
    return redirect('/login');
}
}


