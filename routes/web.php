<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('app_home');

Route::get('/about', [HomeController::class, 'about'])->name('app_about');
Route::get('/contact-nous', [HomeController::class, 'contact'])->name('app_contact');
Route::post('/contact-nous', [HomeController::class, 'contactSend']);

Route::get('books', [BookController::class, 'allBooks'])->name('app_books');
Route::get('book/create', [BookController::class, 'create'])->name('app_bookcreate');
Route::post('book/create', [BookController::class, 'store']);
Route::get('book/{id}', [BookController::class, 'show'])->name('app_book');

Route::get('authors', [AuthorController::class, 'allAuthors'])->name('app_authors');
Route::get('author/create', [AuthorController::class, 'create'])->name('app_authorcreate');
Route::post('author/create', [AuthorController::class, 'store']);
Route::get('author/{id}', [AuthorController::class, 'showAuthor'])->name('app_author');


Route::get('categories', [CategoryController::class, 'index'])->name('app_categories');
Route::get('category/create', [CategoryController::class, 'create'])->name('app_categorycreate');
Route::post('category/create', [CategoryController::class, 'store']);
Route::get('category/{id}', [CategoryController::class, 'show'])->name('app_category');
