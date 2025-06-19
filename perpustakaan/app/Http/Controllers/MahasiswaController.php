<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;

class MahasiswaController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $borrowings = auth()->user()->borrowings()->with('book')->get();

        return view('mahasiswa.dashboard', compact('books', 'borrowings'));
    }
}
