<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = new Books();
        $book->title = $request->title;
        $book->year = $request->year;
        $book->author = $request->author;
        $book->image = $request->image;
        $book->numofbooks = $request->numofbooks;
        $book->category_id = $request->category_id;
        $book->save();
        return response()->json([
            "message" => "Book and category saved successfully.",
            "book" => $book,
        ], 201);
    }

    function update(Request $request, $id)
    {
        $book = Books::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found.'
            ], 404);
        }
        $book->update([
            'title' => $request->title,
            'year' => $request->year,
            'author' => $request->author,
            'image'=> $request->image,
            'numofbooks' => $request->numofbooks,
            'category_id' => $request->category_id,
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }


    public function show($id)
    {
        $book = Books::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Book not found.'
            ], 404);
        }
        return response()->json($book);
    }


    function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
    }
}
