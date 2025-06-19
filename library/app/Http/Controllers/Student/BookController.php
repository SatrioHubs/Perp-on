<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon; // Untuk manipulasi tanggal

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('stock', '>', 0)->get(); // Hanya tampilkan buku dengan stok > 0
        return view('student.books.index', compact('books'));
    }

    public function borrow(Request $request, Book $book)
    {
        // Validasi input durasi peminjaman
        $request->validate([
            'duration' => 'required|integer|min:1|max:30', // Misal, min 1 hari, max 30 hari
        ]);

        // Cek stok buku
        if ($book->stock <= 0) {
            return back()->with('error', 'Maaf, stok buku ini sedang kosong.');
        }

        // Cek apakah pengguna sudah meminjam buku ini dan belum dikembalikan
        $existingBorrowing = Borrowing::where('user_id', auth()->id())
                                    ->where('book_id', $book->id)
                                    ->where('status', 'borrowed')
                                    ->first();

        if ($existingBorrowing) {
            return back()->with('error', 'Anda sudah meminjam buku ini dan belum mengembalikannya.');
        }


        // Kurangi stok buku
        $book->decrement('stock');

        // Buat entri peminjaman
        $borrowedDate = Carbon::now();
        $dueDate = $borrowedDate->copy()->addDays($request->duration);

        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_date' => $borrowedDate,
            'due_date' => $dueDate,
            'status' => 'borrowed',
        ]);

        return redirect()->route('student.borrowings.index')->with('success', 'Buku berhasil dipinjam! Mohon kembalikan sebelum ' . $dueDate->format('d M Y') . '.');
    }
}