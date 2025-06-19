<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::resource('/admin/books', AdminBookController::class);
});

Route::middleware('mahasiswa')->group(function () {
    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/riwayat', [MahasiswaController::class, 'riwayat']);
    Route::post('/mahasiswa/pinjam/{id}', [BorrowingController::class, 'store']);
    Route::post('/mahasiswa/kembali/{id}', [BorrowingController::class, 'return']);
});
