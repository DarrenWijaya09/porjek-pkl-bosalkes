<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource (All Products).
     */
    public function index(Request $request)
    {
        // Paginate the regular products
        $products = Products::paginate(9);

        // Get categories for the sidebar
        $categories = Categories::withCount('products')->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all(); // Get all categories to show in the form
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if there is an image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Create the product
        Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display all products (Show All Products).
     */
    public function showByCategoryName($category)
    {
        // Cari kategori berdasarkan nama
        $category = Categories::with('products')->where('name', $category)->firstOrFail();

        // Ambil produk untuk kategori ini dengan pagination
        $perPage = 9;
        $products = $category->products()->paginate($perPage);

        // Ambil kategori lain untuk sidebar
        $categories = Categories::withCount('products')->get();

        return view('products.index', compact('category', 'products', 'categories'));
    }

    public function showByCategoryId($id)
    {
        // Cari kategori berdasarkan ID
        $category = Categories::with('products')->findOrFail($id);

        // Ambil produk untuk kategori ini dengan pagination
        $perPage = 9;
        $products = $category->products()->paginate($perPage);

        // Ambil kategori lain untuk sidebar
        $categories = Categories::withCount('products')->get();

        return view('products.index', compact('category', 'products', 'categories'));
    }

    /**
     * Show all products.
     */
    public function showAll()
    {
        $products = Products::latest()->paginate(20); // Paginate 20 products per page
        $categories = Categories::withCount('products')->get(); // Get all categories for sidebar
        return view('products.index', compact('products', 'categories'));
    }

    public function show(Request $request)
    {
        $perPage = 9;

        // Ambil parameter kategori dari URL
        $categoryName = $request->get('category');

        if ($categoryName) {
            // Filter produk berdasarkan kategori
            $category = Categories::where('name', $categoryName)->first();
            $products = $category->products()->latest()->paginate($perPage);
        } else {
            // Ambil semua produk jika tidak ada filter kategori
            $products = Products::latest()->paginate($perPage);
        }

        // Ambil kategori untuk sidebar
        $categories = Categories::withCount('products')->get();

        // Kirim data ke view
        return view('products.index', compact('products', 'categories'));
    }

    public function showProductDetails($id)
    {
        // Ambil produk berdasarkan ID
        $product = Products::findOrFail($id);

        // Ambil 4 produk random, kecuali produk yang sedang dilihat
        $randomProducts = Products::where('id', '!=', $id)->inRandomOrder()->take(10)->get();

        // Kirim data ke view
        return view('products.show', compact('product', 'randomProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Products::findOrFail($id);

        // Handle file upload if there is an image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image_path = $imagePath;
        }

        // Update product information
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        // Delete image if exists
        // if ($product->image_path) {
        //     \Storage::delete('public/' . $product->image_path);
        // }

        // // Delete the product
        // $product->delete();

        // return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
