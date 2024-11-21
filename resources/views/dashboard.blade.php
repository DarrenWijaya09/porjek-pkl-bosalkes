@extends('layouts.app') @section('content')
    <!-- Product Banner Section -->
    <div class="relative w-full h-[500px]">
        <img src="{{ asset('asset/img/banner.jpg') }}" alt="Product Image" class="w-full h-full object-cover shadow-none">
        <!-- Mengurangi shadow jika perlu -->
        <div
            class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 text-white text-3xl font-semibold">
            <span>Your Product Name</span>
        </div>
    </div>

    <!-- BOSALKES Description Section -->
    <div class="bg-white py-12">
        <div class="container mx-auto text-center px-6">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-[#53c076] to-[#14afaa] bg-clip-text text-transparent mb-4">
                Welcome to BOSALKES
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed mb-6 px-20">
                BOSALKES is your trusted partner in providing high-quality medical and
                healthcare equipment. We specialize in offering a wide range of products to
                support the needs of healthcare professionals and institutions. Our collection
                includes medical tools, laboratory equipment, and emergency response items,
                ensuring that you have everything needed to maintain high standards of care and
                efficiency.
            </p>
        </div>
    </div>

    <!-- Product Images Grid Section -->
    <div class="flex space-x-4 mt-4 px-4">
        <!-- Sidebar Category List -->
        <div
            class="w-1/4 bg-gradient-to-r from-[#53c076] to-[#14afaa] text-white rounded-lg shadow-md p-4 h-full overflow-y-auto max-h-[80vh]">
            <h2 class="text-xl font-semibold mb-4">Kategori</h2>
            <ul class="space-y-2 divide-y divide-white">
                <li class="py-2">
                    <a href="{{ route('products.all') }}" class="hover:underline">
                        Semua Produk
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li class="py-2">
                        <a href="{{ route('products.category.name', $category->name) }}" class="hover:underline">
                            {{ $category->name }}
                            ({{ $category->products_count }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Product Images Grid -->
        <div class="w-3/4 grid grid-cols-2 gap-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg mb-4">
                <img src="{{ asset('asset/img/3.jpg') }}" alt="Produk 1" class="w-full h-80 object-cover">
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg mb-4">
                <img src="{{ asset('asset/img/1.jpg') }}" alt="Produk 2" class="w-full h-80 object-cover">
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg mb-4">
                <img src="{{ asset('asset/img/1.jpg') }}" alt="Produk 3" class="w-full h-80 object-cover">
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg mb-4">
                <img src="{{ asset('asset/img/3.jpg') }}" alt="Produk 4" class="w-full h-80 object-cover">
            </div>
        </div>
    </div>

    <!-- Our Brand Section Below Product Images Grid -->
    <div class="bg-white py-12 mt-8">
        <div class="container mx-auto text-center">
            <h2
                class="text-3xl font-bold bg-gradient-to-r from-[#53c076] to-[#14afaa] text-transparent bg-clip-text uppercase tracking-wide">
                Our Brand</h2>
            <p class="text-lg text-gray-500 mt-2">Showcasing our premium collection</p>
        </div>
    </div>

    <!-- Card Carousel Section with margin top and bottom -->
    <div class="w-full relative mt-3 mb-8">
        <!-- Added mb-8 for bottom margin -->
        <div class="swiper default-carousel swiper-container">
            <div class="swiper-wrapper">
                <!-- Slide 1 with 5 cards -->
                <div class="swiper-slide flex justify-center items-center gap-4">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 1"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 2"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 3"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 4 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 4"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 5 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 5"
                            class="w-full h-40 object-cover">
                    </div>
                </div>

                <!-- Slide 2 with 5 cards -->
                <div class="swiper-slide flex justify-center items-center gap-4">
                    <!-- Card 6 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 6"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 7 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 7"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 8 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 8"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 9 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 9"
                            class="w-full h-40 object-cover">
                    </div>
                    <!-- Card 10 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-64">
                        <img src="{{ asset('asset/img/images-removebg-preview.png') }}" alt="Product 10"
                            class="w-full h-40 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terbaru Section -->
    <div class="bg-white py-12 mt-8">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Title with Centered Line -->
            <div class="flex flex-col items-center">
                <!-- Top Line -->
                <div class="w-24 h-1 bg-gradient-to-r from-[#53c076] to-[#14afaa] mb-4"></div>

                <!-- Title -->
                <h2
                    class="text-3xl font-bold bg-gradient-to-r from-[#53c076] to-[#14afaa] text-transparent bg-clip-text text-center uppercase tracking-wide">
                    Produk Terbaru
                </h2>

                <!-- Bottom Line -->
                <div class="w-24 h-1 bg-gradient-to-r from-[#53c076] to-[#14afaa] mt-4"></div>
            </div>

            <p class="text-lg text-gray-500 mt-2 text-center">Discover our latest products</p>
            <!-- Products Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                        <!-- Gambar Produk -->
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-32 object-cover mb-2">

                        <!-- Nama Produk -->
                        <h3 class="text-md font-bold text-gray-800">
                            <a href="{{ route('products.details', $product->id) }}" class="hover:underline">
                                {{ $product->name }}
                            </a>
                        </h3>

                        <!-- Harga Produk -->
                        <p class="text-red-600 font-bold mt-2">Rp.
                            {{ number_format($product->price, 0, ',', '.') }}</p>

                        <!-- Tombol Minta Penawaran -->
                        <a href="{{ url('/contact') }}" class="mt-4 inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            <button class="w-full text-center">
                                Minta Penawaran
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Artikel dan Blog Section -->
    <div class="bg-white py-12 mt-8">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Title with Centered Line -->
            <div class="flex flex-col items-center">
                <!-- Top Line -->
                <div class="w-24 h-1 bg-gradient-to-r from-[#53c076] to-[#14afaa] mb-4"></div>

                <!-- Title -->
                <h2
                    class="text-3xl font-bold bg-gradient-to-r from-[#53c076] to-[#14afaa] text-transparent bg-clip-text text-center uppercase tracking-wide">
                    Artikel dan Blog
                </h2>

                <!-- Bottom Line -->
                <div class="w-24 h-1 bg-gradient-to-r from-[#53c076] to-[#14afaa] mt-4"></div>
            </div>

            <p class="text-lg text-gray-500 mt-2 text-center">Informasi terkini dan artikel menarik seputar kesehatan dan
                peralatan medis</p>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                <!-- Article Card 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('asset/img/Wallpaper.jpg') }}" alt="Artikel 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Tips Memilih Peralatan Medis Berkualitas</h3>
                        <p class="text-gray-500 mt-2">Panduan memilih peralatan medis terbaik untuk
                            kebutuhan klinik atau rumah sakit Anda.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:underline mt-4 inline-block">Baca
                            Selengkapnya</a>
                    </div>
                </div>

                <!-- Article Card 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('asset/img/Wallpaper.jpg') }}" alt="Artikel 2" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Manfaat Menggunakan Alat Medis Modern</h3>
                        <p class="text-gray-500 mt-2">Bagaimana teknologi modern meningkatkan akurasi dan efisiensi layanan
                            kesehatan.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:underline mt-4 inline-block">Baca
                            Selengkapnya</a>
                    </div>
                </div>

                <!-- Article Card 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ asset('asset/img/Wallpaper.jpg') }}" alt="Artikel 3" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Peran Penting Alat Laboratorium dalam Diagnosis</h3>
                        <p class="text-gray-500 mt-2">Mengenal alat-alat laboratorium yang esensial untuk proses diagnosis
                            medis.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:underline mt-4 inline-block">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
