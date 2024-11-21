<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;  // Pastikan kamu sudah memiliki model Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Categories::all();  // Mengambil semua data kategori
        return view('admin.categories.index', compact('categories'));
    }

    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('admin.categories.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',  // Validasi input
        ]);

        Categories::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Memperbarui data kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',  // Validasi input
        ]);

        $category = Categories::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
