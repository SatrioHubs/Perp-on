<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function store(Request $request, Book $book)
    {
        if ($book->stok < 1) {
            return back()->with('error', 'Stok buku habis!');
        }

        $request->validate([
            'lama_pinjam' => 'required|integer|min:1',
        ]);

        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'lama_pinjam' => $request->lama_pinjam,
        ]);

        $book->decrement('stok');

        return back()->with('success', 'Peminjaman berhasil!');
    }
}
