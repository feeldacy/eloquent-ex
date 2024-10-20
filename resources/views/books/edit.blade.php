<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

        <h4>Edit Buku</h4>
        <form method="post" action="{{route('books.update', $buku->id)}}">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judulInput" class="form-label">Judul</label>
                <input value="{{$buku->judul}}" type="text" name="judul" id="judulInput" class="form-control" placeholder="Masukkan judul">
            </div>
            <div class="mb-3">
                <label for="penulisInput" class="form-label">Penulis</label>
                <input value="{{$buku->penulis}}" type="text" name="penulis" id="penulisInput" class="form-control" placeholder="Masukkan penulis">
            </div>
            <div class="mb-3">
                <label for="hargaInput" class="form-label">Harga</label>
                <input value="{{$buku->harga}}" type="text" name="harga" id="hargaInput" class="form-control" placeholder="Masukkan harga">
            </div>
            <div class="mb-3">
                <label for="dateInput" class="form-label">Tanggal</label>
                <input value="{{$buku->tgl_terbit}}" type="date" name="tgl_terbit" id="dateInput" class="form-control" placeholder="Masukkan Tanggal">
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
            <a href="{{'/books'}}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



