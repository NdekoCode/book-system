<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('pages.categories.index', compact('categories'));
    }
    public function show(int $id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $books = $category->books()->get();
        return view('pages.categories.show', compact('category', 'books'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {

        $categoryData = $request->validate(['title' => 'required|min:2', 'description' => 'required|string|min:5|max:150']);
        if ($categoryData) {
            Category::create($categoryData);
            return redirect()->route('app_categories');
        }
        return view('pages.categories.create');
    }
}
