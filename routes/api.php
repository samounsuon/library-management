<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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
Route::get("/registers",[RegisterController::class,"index"]);
// Route::post("/registers",[RegisterController::class,"store"]);
Route::prefix('register')->group(function(){
    Route::apiResource('registers', RegisterController::class);
});
Route::prefix('book')->group(function(){
    Route::apiResource('books', BooksController::class);
});
Route::prefix('category')->group(function(){
    Route::apiResource('categories', CategoriesController::class);
});
