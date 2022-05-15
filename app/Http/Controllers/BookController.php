<?php

namespace App\Http\Controllers;

use App\Models\Author;
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

    public function create()
    {
        $authors = Author::get();
        return view('pages.books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $result = $request->validate([
            'name' => 'required|min:3|string',
            'isbn' => 'required|min:10|max:11|integer',
            'price' => 'required|numeric|min:1',
            'author_id' => 'required|integer|min:1',
            'description' => 'required|string|min:3|max:1000',
            'image_desc' => 'required|image'
        ]);
        if ($result) {
            Book::create([
                'name' => $request->name,
                'isbn' => $request->isbn,
                'price' => $request->price,
                'author_id' => $request->author_::orderBy('id', 'DESC'),
                'description' => $request->description,
                'image_desc' => $request->image_desc
            ]);
            return redirect()->route('app_books')->with('success', "Votre livre a été ajouter avec succés");
        }
    }
}
