<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (Auth::user()->isStudent()) {
            return $next($request);
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman mahasiswa.');
        }

        // Jika user tidak punya role, logout
        return redirect()->route('logout');
    }
}

