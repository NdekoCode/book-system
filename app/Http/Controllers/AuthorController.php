<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function allAuthors()
    {
        $authors = Author::all();
        return view('pages.authors.authors', compact('authors'));
    }
    public function showAuthor(int $id)
    {
        $author = Author::where('id', $id)->firstOrFail();
        $books = $author->books->sortByDesc('created_at');
        return view('pages.authors.author', compact('author', 'books'));
    }
}
