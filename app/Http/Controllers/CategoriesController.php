<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {

        $category = new Categories();
        $category->type = $request->type;
        $category->save();

        return response()->json([
            "message" => "Category created successfully",
            "category" => $category
        ], 201);
    }
}