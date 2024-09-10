<?php

namespace App\Http\Controllers;
use App\Models\Books;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $books_data = Books::all()->sortBy('id');

        $countBooks = $books_data->count();

        $totalPrice = $books_data->sum('harga');
        return view('books.index', compact('books_data', 'countBooks', 'totalPrice'));
    }
}
