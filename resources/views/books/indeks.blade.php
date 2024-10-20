<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />


    <style>
        body{
        padding: 30px;
        }

        /* .background-color {
            background-color: #FEF9D9;
        } */

        h1{
            text-align: center;
        }

        .tablesview{
            background-color: #C4DAD2;
            padding: 20px;
            border-radius: 20px;
        }
    </style>
</head>
<body class="background-color">
    @if(Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif

    <h1>DATA BUKU</h1>
    <div class="tablesview">
        <a href="{{ route('books.create')}}" class="btn btn-primary float-end" style="margin-bottom: 30px;">Tambah Buku</a>
        <table class="table table-bordered border-black" id="datatable">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Hapus</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books_data as $index => $books)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$books->judul}}</td>
                        <td>{{$books->penulis}}</td>
                        <td>{{"Rp. ".number_format($books->harga, 2, '.', '.')}}</td>
                        <td>{{\Carbon\Carbon::parse($books->tgl_terbit)->format('d-m-Y')}}</td>
                        <td>
                            <form action="{{ route('books.destroy', $books->id)}}" method="POST">

                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin mau di hapus?')" type="submit" class="btn btn-danger">
                                    Hapus
                                </button>

                            </form>
                        </td>
                        <td>

                            <a href="{{ route('books.edit', $books->id)}}" class="btn btn-primary float-end">Edit Buku</a>

                        </td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <th scope="row" colspan="3" class="table-active table-primary border-black">Jumlah Harga</th>
                    <td colspan="3">{{'Rp. '.number_format($totalPrice,  2, '.', '.')}}</td>
                </tr>
                <tr>
                    <th scope="row" colspan="3" class="table-active table-primary border-black">Banyak Data</th>
                    <td colspan="3">{{$countBooks}}</td>
                </tr> --}}
            </tbody>
        </table>
    </div>

    {{-- <div>
        {{$books_data->links()}}
    </div> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>

</body>
</html>

{{-- <head>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
</head>
<body>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body> --}}
