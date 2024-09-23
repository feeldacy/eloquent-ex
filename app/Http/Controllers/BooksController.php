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

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $buku = new Books();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/books');
    }

    public function destroy($id){
        $buku = Books::find($id);
        $buku ->delete();

        return redirect('/books');
    }

    public function edit($id){
        $buku = Books::find($id);
        return view('books.edit', compact('buku'));
    }

    public function update(Request $request, $id){
        $buku = Books::find($id);
        $buku->judul = $request->input('judul');
        $buku->penulis = $request->input('penulis');
        $buku->harga = $request->input('harga');
        $buku->tgl_terbit = $request->input('tgl_terbit');

        $buku->save();

        return redirect('/books');
    }
}
