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
        $book = Book::where('id', $id)->firstOrFail();
        $otherBooks = Book::where('category', $book->category)->get();
        return view('pages.books.show', compact('book', 'otherBooks'));
    }
}
