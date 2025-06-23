<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Members;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get("/registers",[RegisterController::class,"index"]);
// Route::post("/registers",[RegisterController::class,"store"]);
Route::prefix('v1')->group(function(){
    Route::apiResource('registers', RegisterController::class);
    Route::apiResource("member",MembersController::class);  
    Route::apiResource("books",BooksController::class);
    Route::apiResource("category",CategoriesController::class);
});







Route::put("/member/{id}",[MembersController::class,"update"]);
Route::delete("/member/{id}",[MembersController::class,"destroy"]);
Route::post("/login",[LoginController::class,"UserLogin"]);

Route::post("/borrow",[BorrowController::class,"borrowBook"]);



// Route::post("/books",[BooksController::class,"store"]);
// Route::put("/books/{id}",[BooksController::class,"update"]);