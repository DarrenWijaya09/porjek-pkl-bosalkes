@extends('layouts.app')

@section('content')
    <!-- Produk Terbaru -->
    <div class="flex flex-col items-center my-8">
        <div class="w-24 h-1 bg-gradient-to-r from-[#53c076] to-[#14afaa] mb-4"></div>
        <h2 class="text-3xl font-bold text-center uppercase tracking-wide">
            Jual <span class="bg-gradient-to-r from-[#53c076] to-[#14afaa] text-transparent bg-clip-text">Alat Medis</span>
            di Jakarta
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-[#53c076] to-[#14afaa] mt-4"></div>
        <p class="text-center mt-6 text-lg text-gray-700 w-full md:max-w-5xl lg:max-w-6xl">
            Bosalkes merupakan Platfoam yang menjual berbagai macam alat medis, alat kesehatan dan perlengkapan rumah sakit
            lainnya, dengan sistem yang terintegrasi oleh berbagai macam principle dan distributor. Kami siap memberikan
            kebutuhan yang sedang Anda cari.
        </p>
    </div>
    <div class="flex bg-white p-4">
        <!-- Sidebar Kategori -->
        <div
            class="w-1/4 bg-gradient-to-r from-[#53c076] to-[#14afaa] rounded-lg shadow-md p-4 text-white overflow-y-auto max-h-[80vh]">
            <h2 class="text-lg font-bold mb-4">Kategori</h2>
            <ul class="space-y-2 divide-y divide-white">
                <li class="py-2">
                    <a href="{{ route('products.all') }}" class="hover:underline">
                        Semua Produk
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li class="py-2">
                        <a href="{{ route('products.category.name', $category->name) }}" class="hover:underline">
                            {{ $category->name }} ({{ $category->products_count }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Produk Terbaru Container -->
        <div class="w-3/4 ml-6">
            <div class="grid grid-cols-3 gap-4">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-32 object-cover mb-2">
                            <a href="{{ route('products.details', $product->id) }}" class="hover:underline">
                                {{ $product->name }}
                            </a>
                        <p class="text-red-600 font-bold mt-2">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                        <!-- Tombol Minta Penawaran dengan Link -->
                        <a href="{{ url('/contact') }}"
                            class="mt-4 inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            <button class="w-full text-center">
                                Minta Penawaran
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination: Always show it, even if it's only one page -->
            <div class="mt-6">
                {{ $products->appends(request()->query())->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
