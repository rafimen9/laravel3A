<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk</h2>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}">+ Tambah Produk</a>

    <table border="1" cellpadding="5" cellspacing="0" style="margin-top:10px;">
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Edit</th>

        </tr>
        @foreach ($products as $p)
        <tr>
            <td>{{ $p->title }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $p->id) }}">Edit</a>
            </td>

            <td>
                <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color:red;">Delete</button>
                </form>
            </td>


        </tr>
        @endforeach
    </table>
</body>
</html>
