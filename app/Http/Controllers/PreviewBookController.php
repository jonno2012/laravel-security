<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PreviewBookController extends Controller
{
    public function __invoke(Book $book)
    {
        return view('books.show', ['book', $book]);
    }
}
