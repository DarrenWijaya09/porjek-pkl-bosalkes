<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Product;
use App\Models\Contacts; // Ganti Message dengan Contact
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        // Ambil data ringkasan untuk dashboard
        $categoriesCount = Categories::count();
        $productsCount = Products::count();
        $contactsCount = Contacts::count(); // Ganti Message menjadi Contact

        return view('admin.dashboard', compact('categoriesCount', 'productsCount', 'contactsCount'));
    }

    // Menampilkan daftar kategori
    // public function manageCategories()
    // {
    //     $categories = Categories::all(); // Ambil semua kategori
    //     return view('admin.categories.index', compact('categories'));
    // }


    // // Menampilkan daftar produk
    // public function manageProducts()
    // {
    //     $products = Products::all(); // Ambil semua produk
    //     return view('admin.products.index', compact('products'));
    // }

    // // Menambahkan produk baru
    // public function createProduct()
    // {
    //     return view('admin.products.create');
    // }

    // // Menampilkan kontak/pesan yang masuk
    // public function manageContacts()
    // {
    //     $contacts = Contacts::all(); // Ganti Message menjadi Contact
    //     return view('admin.messages.index', compact('contacts')); // Ganti 'messages' dengan 'contacts'
    // }

    // Fungsi lainnya untuk edit, delete kategori atau produk bisa ditambahkan di sini
}
