<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // READ - Get all categories
    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|string|max:255',
    ]);

    $category = Categories::create($validated);

    return response()->json($category, 201);
}


    // READ - Show single category
    public function show($id)
    {
        $category = Categories::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

   public function update(Request $request, $id)
{
    $category = Categories::find($id);

    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }

    $validated = $request->validate([
        'type' => 'required|string|max:255',
    ]);

    $category->update($validated);

    return response()->json($category);
}

    // DELETE - Delete category
    public function destroy($id)
    {
        $category = Categories::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
