<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-role', function () {
    return auth()->check() ? auth()->user()->role : 'Belum login';
});

require __DIR__.'/auth.php';

// Auto redirect dashboard
Route::middleware(['auth'])->get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'mahasiswa') {
        return redirect()->route('mahasiswa.dashboard');
    }
    abort(403);
})->name('dashboard');

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/books', AdminBookController::class);
});

// Mahasiswa
Route::middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::post('/mahasiswa/pinjam/{book}', [BorrowingController::class, 'store'])->name('mahasiswa.pinjam');
});
