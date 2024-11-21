<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // Metode untuk menampilkan daftar produk
    public function index()
    {
        $products = Products::all();
        return view('admin.product.index', compact('products'));
    }

    // Metode untuk menampilkan form tambah produk
    public function create()
    {
        $categories = Categories::all();
        return view('admin.product.create', compact('categories'));
    }

    // Metode untuk menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Products::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath ?? null,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Metode untuk mengedit produk
    public function edit(Products $product)
    {
        $categories = Categories::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    // Metode untuk memperbarui produk
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Products::findOrFail($id);

        // Jika ada gambar baru, upload dan hapus gambar lama jika ada
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath ?? $product->image,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Metode untuk menghapus produk
    public function destroy(Products $product)
    {
        // Menghapus produk
        $product->delete();

        // Redirect ke daftar produk dengan pesan sukses
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus!');
    }
}
