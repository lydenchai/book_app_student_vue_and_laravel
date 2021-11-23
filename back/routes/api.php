<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Book Route
Route::get('/books', [BookController::class ,'index']);
Route::post('/books', [BookController::class ,'store']);
Route::get('/books/{id}', [BookController::class ,'show']);
Route::put('/books/{id}', [BookController::class ,'update']);
Route::delete('/books/{id}', [BookController::class ,'destroy']);