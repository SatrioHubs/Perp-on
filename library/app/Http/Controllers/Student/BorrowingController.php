<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::where('user_id', auth()->id())->with('book')->orderBy('borrowed_date', 'desc')->get();
        return view('student.borrowings.index', compact('borrowings'));
    }
}