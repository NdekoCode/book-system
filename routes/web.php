<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

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
Route::post('/contact-nous', [HomeController::class, 'contactSend'])->name('app_sendcontact');

Route::get('books', [BookController::class, 'allBooks'])->name('app_books');
Route::get('book/create', [BookController::class, 'store'])->name('app_bookcreate');
Route::get('book/{id}', [BookController::class, 'show'])->name('app_book');

Route::get('authors', [AuthorController::class, 'allAuthors'])->name('app_authors');
Route::get('author/{id}', [AuthorController::class, 'showAuthor'])->name('app_author');
