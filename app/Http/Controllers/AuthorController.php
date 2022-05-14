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
        // Recupère toutes livres associers à l'auteur id
        $books = $author->books()->get();

        // ->get() permet de recuperer ou des capter tous les données uniquement de la DB et non les infos qui se situe sur la requete
        return view('pages.authors.author', compact('author', 'books'));
    }
}
