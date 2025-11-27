<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Update Produk</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')


        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $product->title }}"><br><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi">{{ $product->deskripsi }}</textarea><br><br>

        <label>Stok:</label>x
        <input type="number" name="stok" value="{{ $product->stock }}"><br><br>

        <label>Harga:</label>
        <input type="number" name="harga" value="{{ $product->price }}"><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
