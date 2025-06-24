<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    function index(){
        $borrowbook= DB::table('member')->all();
        return response()->json($borrowbook);
    }
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
    function destroy($id){
        $borrowbook= Members::find($id);
        $borrowbook->delete();
    }
}