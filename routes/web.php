<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware('can:update,book')->group(function() { // applying a policy
//    Route::get('book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
//    Route::post('book/{id}/update', [BookController::class, 'update'])->name('book.update');
//    Route::post('book/{id}/delete', [BookController::class, 'delete'])->name('book.delete');
//});

Route::resource('book', BookController::class);
