<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    function index(){
        $borrowbook= DB::table('borrows')->get();
        return response()->json($borrowbook);
    }



    function store(Request $request){
        $validated = $request->validate([
            'date' => 'required|date',
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'status' => 'sometimes|string', // allow status if provided
        ]);
        $borrowbook = new Borrow();
        $borrowbook->borrow_date = $validated['date'];
        $borrowbook->book_id = $validated['book_id'];
        $borrowbook->member_id = $validated['member_id'];
        $borrowbook->status = $validated['status'] ?? 'pending'; // set status or default
        $borrowbook->save();
        return response()->json(['message' => 'Book borrowed successfully.']);
    }


    function destroy($id){
        $borrowbook = Borrow::find($id);
        if (!$borrowbook) {
            return response()->json(['message' => 'Borrow record not found.'], 404);
        }
        $borrowbook->delete();
        return response()->json(['message' => 'Successfully deleted.']);
    }
}