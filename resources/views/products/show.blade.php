@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <!-- Breadcrumb -->
        <nav class="text-sm mb-6">
            <a href="/" class="text-gray-500 hover:underline">Home</a> >
            <a href="/category" class="text-gray-500 hover:underline">Kategori</a> >
            <span class="text-gray-700 font-bold">Peralatan Medis</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Gambar Produk -->
            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="rounded-lg shadow-md w-full h-auto object-cover">
            </div>

            <!-- Informasi Produk -->
            <div class="md:col-span-2">
                <h1 class="text-2xl font-bold text-gray-800 mb-3">{{ $product->name }}</h1>
                <p class="text-red-600 text-2xl font-bold mb-5">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>

                <!-- Detail Produk -->
                <table class="text-left text-sm w-full mb-5">
                    <tr class="border-b">
                        <td class="py-2 text-gray-600">Update Terakhir:</td>
                        <td class="py-2">{{ $product->updated_at->format('d M Y') }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-gray-600">Negara Asal:</td>
                        <td class="py-2">Indonesia</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-gray-600">Pembelian Min:</td>
                        <td class="py-2">1 Box</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 text-gray-600">Kategori:</td>
                        <td class="py-2">{{ $product->category->name }}</td>
                    </tr>
                </table>

                <!-- Tombol Bagikan -->
                <div class="flex items-center gap-4 mb-5">
                    <span class="text-gray-600">Bagikan:</span>
                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-sky-400 hover:text-sky-600"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-green-500 hover:text-green-700"><i class="fab fa-whatsapp"></i></a>
                </div>

                <!-- Tombol Minta Penawaran -->
                <a href="{{ url('/contact') }}"
                    class="block text-center bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                    Minta Penawaran
                </a>
            </div>
        </div>

        <!-- Deskripsi Produk -->
        <div class="mt-12">
            <h2 class="text-xl font-semibold mb-4">Deskripsi Produk</h2>
            <ul class="list-disc list-inside space-y-3 text-gray-700">
                <li><strong>Jenis/Kategori Produk:</strong> {{ $product->category->name }}</li>
                <li><strong>Ukuran:</strong> Lebar: 2.5 cm, Panjang: 9.2 m</li>
                <li><strong>Bahan:</strong> Material hypoallergenic, aman untuk kulit.</li>
                <li><strong>Daya Rekat:</strong> Kuat dan tidak mudah lepas.</li>
            </ul>
        </div>

        <!-- Produk Random -->
        <div class="container mx-auto mt-10 px-4">
            <!-- Produk Random -->
            <div class="mt-12">
                <h2 class="text-xl font-semibold mb-6">Produk Lainnya</h2>

                <!-- Slider Container -->
                <div class="relative">
                    <!-- Produk Slider -->
                    <div id="productSlider" class="flex gap-6 overflow-x-auto scroll-smooth">
                        @foreach ($randomProducts->take(10) as $randomProduct)
                            <div
                                class="bg-white rounded-lg shadow-md p-4 min-w-[300px] w-[200px] h-[320px] flex-shrink-0 flex flex-col justify-between">
                                <!-- Gambar Produk -->
                                <img src="{{ asset('storage/' . $randomProduct->image) }}" alt="{{ $randomProduct->name }}"
                                    class="w-full h-32 object-cover rounded mb-3">

                                <!-- Nama Produk -->
                                <h3 class="text-sm font-semibold text-gray-800 mb-2 text-center">{{ $randomProduct->name }}
                                </h3>

                                <!-- Harga -->
                                <p class="text-red-600 font-bold text-center">Rp.
                                    {{ number_format($randomProduct->price, 0, ',', '.') }}</p>

                                <!-- Tombol Detail Produk -->
                                <a href="{{ route('products.details', $randomProduct->id) }}"
                                    class="mt-4 inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-center transition">
                                    Lihat Detail
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
