<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\BorrowingController as StudentBorrowingController;


// 1. Default root redirect
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->isStudent()) {
            return redirect()->route('student.dashboard');
        }
        // Jika tidak punya role, logout
        return redirect()->route('logout');
    }
    return redirect('/login');
});

// 2. Routes untuk login/logout (tanpa middleware)
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Route untuk ADMIN (middleware: auth + admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('books', AdminBookController::class);

    Route::get('/borrowings', function () {
        $borrowings = \App\Models\Borrowing::with(['user', 'book'])
            ->orderBy('borrowed_date', 'desc')->get();
        return view('admin.borrowings.index', compact('borrowings'));
    })->name('borrowings.index');

    Route::post('/borrowings/{borrowing}/return', function (\App\Models\Borrowing $borrowing) {
        $borrowing->update([
            'returned_date' => now(),
            'status' => 'returned',
        ]);
        $borrowing->book->increment('stock');
        return back()->with('success', 'Buku berhasil ditandai sebagai dikembalikan.');
    })->name('borrowings.return');
});

// 4. Route untuk STUDENT (middleware: auth + student)
Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');

    Route::get('/books', [StudentBookController::class, 'index'])->name('books.index');
    Route::post('/books/{book}/borrow', [StudentBookController::class, 'borrow'])->name('books.borrow');
    Route::get('/my-borrowings', [StudentBorrowingController::class, 'index'])->name('borrowings.index');
});
