<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        // Untuk dashboard publik
        public function publicDashboard()
        {
            return view('dashboard'); // Tampilkan dashboard publik
        }
        
    public function index()
    {
        // Ambil semua kategori beserta jumlah produk di tiap kategori
        $categories = Categories::withCount('products')->get();

        // Ambil semua produk dengan pagination
        $products = Products::latest()->paginate(8);

        // Kirim data ke view dashboard
        return view('dashboard', compact('categories', 'products'));
    }

    /**
     * Display products filtered by category name.
     */
    public function showByCategoryName($categoryName)
    {
        // Cari kategori berdasarkan nama
        $category = Categories::with('products')->where('name', $categoryName)->firstOrFail();

        // Ambil produk dalam kategori ini dengan pagination
        $products = $category->products()->paginate(9);

        // Ambil kategori lain untuk sidebar
        $categories = Categories::withCount('products')->get();

        // Kirim data ke view dashboard
        return view('dashboard', compact('category', 'products', 'categories'));
    }

    /**
     * Display products filtered by category ID.
     */
    public function showByCategoryId($id)
    {
        // Cari kategori berdasarkan ID
        $category = Categories::with('products')->findOrFail($id);

        // Ambil produk untuk kategori ini dengan pagination
        $products = $category->products()->paginate(9);

        // Ambil kategori lain untuk sidebar
        $categories = Categories::withCount('products')->get();

        // Kirim data ke view dashboard
        return view('dashboard', compact('category', 'products', 'categories'));
    }

    /**
     * Show all products, with optional category filtering by name or ID.
     */
    public function show(Request $request)
    {
        $categoryName = $request->get('category');

        if ($categoryName) {
            // Jika ada filter kategori berdasarkan nama
            return $this->showByCategoryName($categoryName);
        }

        $categoryId = $request->get('category_id');

        if ($categoryId) {
            // Jika ada filter kategori berdasarkan ID
            return $this->showByCategoryId($categoryId);
        }

        // Jika tidak ada filter kategori, tampilkan semua produk
        $products = Products::latest()->paginate(9);

        // Ambil kategori lain untuk sidebar
        $categories = Categories::withCount('products')->get();

        // Kirim data ke view dashboard
        return view('dashboard', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fungsi ini bisa ditambahkan jika diperlukan untuk membuat produk baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Fungsi ini bisa ditambahkan jika diperlukan untuk menyimpan produk baru
    }

    /**
     * Display the specified resource.
     */
    public function showById($id)
    {
        // Fungsi ini bisa digunakan jika Anda ingin menampilkan produk berdasarkan ID tertentu
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fungsi ini bisa digunakan untuk mengedit produk
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fungsi ini bisa digunakan untuk memperbarui produk
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Fungsi ini bisa digunakan untuk menghapus produk
    }
}
