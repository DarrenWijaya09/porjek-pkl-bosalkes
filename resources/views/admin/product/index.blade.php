@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Daftar Produk</h2>

            <!-- Tautan untuk menambah produk -->
            <a href="{{ route('admin.product.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded-lg mb-4 inline-block">
                Tambah Produk Baru
            </a>

            <!-- Tabel Produk -->
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Gambar</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Nama Produk</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Kategori</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Harga</th>
                        <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <!-- Tampilkan gambar produk -->
                            <td class="px-6 py-3 border-b text-sm text-gray-700">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 border-b text-sm text-gray-700">{{ $product->name }}</td>
                            <td class="px-6 py-3 border-b text-sm text-gray-700">{{ $product->category->name }}</td>
                            <td class="px-6 py-3 border-b text-sm text-gray-700">{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-6 py-3 border-b text-sm">
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                <!-- Form delete produk -->
                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
