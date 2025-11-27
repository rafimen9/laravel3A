<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama"><br><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi"></textarea><br><br>

        <label>Stok:</label>
        <input type="number" name="stok"><br><br>

        <label>Harga:</label>
        <input type="number" step="0.01" name="harga"><br><br>

        <button type="submit">Tambah</button>
        <button type="reset">Batal</button>
    </form>
</body>
</html>
