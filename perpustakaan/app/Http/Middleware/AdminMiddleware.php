<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->role === 'admin') {
    //         return $next($request);
    //     }

    //     abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
    // }
    public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {
        logger('Role user: ' . Auth::user()->role);
    }

    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }

    abort(403, 'Akses ditolak. Halaman hanya untuk admin.');
}

}
