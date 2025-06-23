<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    // Fetch all books
    public function index()
    {
        $books = Books::all(); 
        return response()->json($books);
    }

    public function store(Request $request)
    {
        // Create new book instance
        $book = new Books();
        $book->title = $request->title;
        $book->year = $request->year;
        $book->author = $request->author;
        $book->save(); 
    

        return response()->json([
            "message" => "Book created successfully.",
            "book" =>$book
        ], 201);
    }
     public function show($id)
    {
        $book = Books::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }
}
