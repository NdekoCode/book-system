<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function allBooks()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
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
        $categories = Category::get();

        return view('pages.books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $bookData = $request->validate([
            'name' => 'required|min:3|string',
            'isbn' => 'required|min:10|max:11|string',
            'price' => 'required|numeric|min:1',
            'author_id' => 'required|integer|min:1',
            'description' => 'required|string|min:3|max:1000',
            'image_desc' => 'required|image|mimes:jpg,jpeg,png,gif',
            'category_id' => 'required'
        ]);
        if ($bookData) {
            $image = $request->file('image_desc');
            $path = "img/books/";
            $profileImage = $path . date('YmdHis') . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move($path, $profileImage);
            $bookData['image_desc'] = $profileImage;

            $category = Category::find($request->category_id);
            Book::create($bookData)->categories()->attach($category);


            return redirect()->route('app_books')->with('success', "Votre livre a été ajouter avec succés");
        }
    }
}
