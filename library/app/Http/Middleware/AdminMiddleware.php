<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (Auth::user()->isAdmin()) {
            return $next($request);
        }

        if (Auth::user()->isStudent()) {
            return redirect()->route('student.dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman admin.');
        }

        // Jika user tidak punya role, logout
        return redirect()->route('logout');
    }
}
