<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoriesController extends Controller
{
    function index(){
    $categories = DB::table('categories')->get();
    return response()->json($categories);
}
}
