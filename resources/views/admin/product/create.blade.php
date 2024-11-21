@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tambah Produk Baru</h2>

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input Nama Produk -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" name="name" id="name" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Deskripsi Produk -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                    <textarea name="description" id="description" rows="4" class="mt-2 p-3 border border-gray-300 rounded-lg w-full">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Harga Produk -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                    <input type="number" name="price" id="price" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('price') }}" required>
                    @error('price')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Stock Produk -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock Produk</label>
                    <input type="number" name="stock" id="stock" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('stock') }}" required>
                    @error('stock')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Kategori Produk -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori Produk</label>
                    <select name="category_id" id="category_id" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Gambar Produk -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                    <input type="file" name="image" id="image" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" accept="image/*">
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button Submit -->
                <div class="mb-4">
                    <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        Simpan Produk
                    </button>
                </div>

                <div class="mb-4">
                    <a href="{{ route('admin.product.index') }}" class="w-full py-3 px-6 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200 text-center">
                        Kembali ke Daftar Produk
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
