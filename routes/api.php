<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Models\Book;
use App\Http\Resources\BookResource;
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

//Route::get('/books', function() {
//    return \App\Models\Book::published()
//        ->select('slug', 'title', 'description', 'image') // good way to select specific attributes.
//        ->get();
//});

Route::get('/books', function() {
    return BookResource::collection(Book::published()->get());
});
