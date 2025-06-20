<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with('book')->where('user_id', Auth::id())->get();
        return view('mahasiswa.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where('stock', '>', 0)->get();
        return view('mahasiswa.loans.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'duration' => 'required|integer|min:1',
        ]);
        $book = Book::findOrFail($request->book_id);
        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku habis!');
        }
        Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'duration' => $request->duration,
            'borrowed_at' => Carbon::now()->toDateString(),
        ]);
        $book->decrement('stock');
        return redirect()->route('mahasiswa.dashboard')->with('success', 'Buku berhasil dipinjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $book = $loan->book;
        $loan->delete();
        if ($book) {
            $book->increment('stock');
        }
        return redirect()->route('mahasiswa.dashboard')->with('success', 'Buku berhasil dikembalikan');
    }
}
