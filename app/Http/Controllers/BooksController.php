<?php

namespace App\Http\Controllers;
use App\Models\Books;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index(){
        // Paginator::useBootstrapFive();
        // $books_data = Books::orderBy('id', 'desc')->paginate(10);

        $books_data = Books::all()->sortBy('id');

        $count_books = $books_data->count();

        $totalPrice = $books_data->sum('harga');

        if (Auth::check()){
            return view('books.restricted', compact('books_data', 'count_books'));
        }
        return view('books.general', compact('books_data', 'count_books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = new Books();
        $buku->judul = $request->judul; // lihat name di view
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/books')
        ->with('pesan', 'Data buku berhasil di Simpan');
    }

    public function destroy($id){
        $buku = Books::find($id);
        $buku ->delete();

        return redirect('/books')->with('pesan', 'Data buku berhasil di Hapus');
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

        return redirect('/books')->with('pesan', 'Data buku berhasil di Update');
    }


    public function search(Request $request) {
        $batas = 5;
        $cari = $request->kata;
        $books_data = Books::where('judul', 'like', "%" . $cari . "%")
            ->orWhere('penulis', 'like', "%" . $cari . "%")
            ->paginate($batas);

        $jumlah_buku = $books_data->count();
        $no = $batas * ($books_data->currentPage() - 1);

        return view('books.search', compact('jumlah_buku', 'books_data', 'no', 'cari'));
    }
}
