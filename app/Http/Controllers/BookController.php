<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function allBooks()
    {
        $books = Book::all();
        return view('pages.books.index', compact('books'));
    }
    public function show(int $id)
    {
        $otherBooks = [];
        $book = Book::where('id', $id)->firstOrFail();
        $categories = $book->categories()->get();
        return view('pages.books.show', compact('book', 'categories', 'otherBooks'));
    }
}
