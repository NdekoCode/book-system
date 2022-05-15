<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function allAuthors()
    {
        $authors = Author::latest()->paginate(9);
        return view('pages.authors.index', compact('authors'));
    }
    public function showAuthor(int $id)
    {
        $author = Author::where('id', $id)->firstOrFail();
        // Recupère toutes livres associers à l'auteur id
        $books = $author->books()->get();

        // ->get() permet de recuperer ou des capter tous les données uniquement de la DB et non les infos qui se situe sur la requete
        return view('pages.authors.show', compact('author', 'books'));
    }
    public function create()
    {
        return view('pages.authors.create');
    }
    public function store(Request $request)
    {
        $authorData = $request->validate(
            [
                'firstname' => 'required|string|min:2|max:100',
                'lastname' => 'required|string|min:2|max:100',
                'email' => 'email|required',
                'description' => 'required|string|min:5,max:500',
                'avatar' => 'required|image|mimes:jpg,jpeg,png,gif',
                'birthday' => 'date|string',

            ]
        );
        $cond1 = Author::where('email', $request->email)->first();
        $cond2 = Author::where('birthday', $request->birthday);
        $authorExist = $cond1 && $cond2;

        if ($authorData && !$authorExist) {
            $avatar = $request->file('avatar');
            $path = "img/authors/";
            $avatarProfile = $path . date('YmdHis') . '-' . $request->firstname . '.' . $avatar->getClientOriginalExtension();
            $authorData['avatar'] = $avatarProfile;
            Author::create($authorData);
            $avatar->move($path, $avatarProfile);
            return redirect()->route('app_authors')->with('success', "Auteur ajouté avec succés");
        }
        return redirect()->route('app_authorcreate')->withInput()->with('email', "L'Auteur existe déjà");
    }
}
