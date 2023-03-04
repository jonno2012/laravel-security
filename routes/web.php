<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/sql_example', function(Request $request) {
    $books = \App\Models\Book::query()
        ->when($request->get('search'), fn($q, $s) => $q->whereRaw("slug LIKE ?", ["%{$s}%"]))
        ->whereNotNull('published_at')
        ->oldest()
        ->get(); // paramaterised queries

    return view('welcome', ['books' => $books]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books/{book}/preview', [\App\Http\Controllers\PreviewBookController::class])
    ->name('books.preview')
    ->middleware('signed'); // tells laravel to use the signedRoute middleware.

Route::get('/book/{hash}/crack_my_hash', function(Request $request) {
    $key = 'sdfsdf';
    $value = 'ssdfsdfsdf';
    if (hash_equals($request->key, $key)) { // we use hash_equals to compare hashes to prevent time based hash comparison
        // hack attempts. See notes.
        return "Passed: {$value} === \"{$key}\"\n";
    }
    return "Failed: {$value} === \"{$key}\"\n";
});

require __DIR__.'/auth.php';
