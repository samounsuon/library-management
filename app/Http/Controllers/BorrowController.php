<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    function borrowBook(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'date' => 'required|date',
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
        ]);

        $borrowbook = new Borrow();
        $borrowbook->borrow_date = $validated['date'];
        $borrowbook->book_id = $validated['book_id'];
        $borrowbook->member_id = $validated['member_id'];
        $borrowbook->save();
        // Optionally, return a response
        return response()->json(['message' => 'Book borrowed successfully.']);
    }
    // function index(){

    // }
}