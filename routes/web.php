<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/books', [BooksController::class, 'index']);

Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');

Route::post('/books', [BooksController::class, 'store'])->name('books.store');

Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');

Route::get('/books/{id}', [BooksController::class,'edit'])->name('books.edit');

Route::put( '/books/{id}', [BooksController::class,'update'])->name('books.update');

Route::post('/books/{id}', [BooksController::class, 'update']) ->name('books.update');
