<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;

class BorrowingController extends Controller
{
    public function store(Request $request, Book $book)
    {
        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis.');
        }

        $request->validate([
            'duration_days' => 'required|integer|min:1|max:30',
        ]);

        Borrowing::create([
            'user_id' => session('user')->id,
            'book_id' => $book->id,
            'duration_days' => $request->duration_days,
            'borrowed_at' => now(),
        ]);

        $book->decrement('stock'); // kurangi stok buku

        return back()->with('success', 'Buku berhasil dipinjam.');
    }
}
    
