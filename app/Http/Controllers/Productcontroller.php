<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // 
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller 
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.tambahproduk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        Product::create([
            'title' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'price' => $request->harga,
            'stock' => $request->stok
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function update(Request $request, string $id): RedirectResponse
    {

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'title' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'price' => $request->harga,
            'stock' => $request->stok
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

        public function destroy($id)
        {
            $produk = Product::findOrFail($id);
            $produk->delete();

            return redirect()->back()->with('success', 'Produk berhasil dihapus!');
        }

    }