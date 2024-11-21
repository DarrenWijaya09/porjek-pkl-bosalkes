<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BOSALKES') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- App Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('asset/js/carousel.js') }}" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <style>
        .card-slider {
            display: flex;
            overflow: hidden;
        }

        .card-slide {
            min-width: 33.3333%;
            margin-right: 24px;
            transition: transform 1s ease-in-out;
        }

        .swiper-wrapper {
            width: 100%;
            height: max-content !important;
            padding-bottom: 64px !important;
            -webkit-transition-timing-function: linear !important;
            transition-timing-function: linear !important;
            position: relative;
        }

        .swiper-pagination-bullet {
            background: #4f46e5;
        }
    </style>
</head>

<body class="bg-white text-gray-900">

    <!-- Fixed Header Section -->
    <header class="bg-gradient-to-r from-[#53c076] to-[#14afaa] py-4 shadow-md fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto flex items-center justify-between px-6">
            <div class="flex items-center w-full">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('asset/img/LOGO.jpg') }}" alt="BOSALKES Logo" width="150px" class="h-10">
                </a>
                <!-- Search Bar -->
                <div class="relative ml-6 flex-grow">
                    <input type="text" placeholder="Search for products..."
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <!-- Cart Icon -->
                <a href="#" class="text-white bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-full ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11h-2v-2H9v-2h2V8h2v2h2v2h-2v2z" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Navbar Section -->
    <nav class="bg-gray-800 text-white shadow-lg mt-16 pt-3">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex space-x-8">
                <a href="{{ url('/') }}"
                    class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Beranda</a>
                <a href="{{ url('/products') }}"
                    class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Katalog Produk</a>
                <a href="{{ url('/about') }}"
                    class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Tentang Kami</a>
                <a href="{{ url('/contact') }}"
                    class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Hubungi Kami</a>
            </div>
            <div class="flex space-x-6">
                @guest
                    <a href="{{ route('login') }}"
                        class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Daftar</a>
                @endguest
                @auth
                    <span class="text-lg font-semibold text-white">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-lg font-semibold hover:text-[#53c076] transition duration-300">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Content --}}
    @yield('content')

    <!-- Footer Section -->
    <div class="bg-gradient-to-r from-[#53c076] to-[#14afaa] text-white py-12 mt-16">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- About Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tentang BOSALKES</h3>
                    <p class="text-gray-200">BOSALKES menyediakan berbagai alat kesehatan medis berkualitas untuk
                        memenuhi kebutuhan klinik dan rumah sakit Anda. Temukan produk dan artikel terkini seputar
                        kesehatan di sini.</p>
                </div>

                <!-- Quick Links Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Link Cepat</h3>
                    <ul>
                        <li><a href="#" class="text-gray-200 hover:text-white">Beranda</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Produk</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Artikel</a></li>
                        <li><a href="#" class="text-gray-200 hover:text-white">Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Info Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                    <p class="text-gray-200">Email: info@bosalkes.com</p>
                    <p class="text-gray-200">Telepon: +62 123 456 789</p>
                    <p class="text-gray-200">Alamat: Jl. Contoh No. 123, Jakarta</p>
                </div>

                <!-- Social Media Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-200 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-gray-200">&copy; 2024 BOSALKES. All rights reserved.</p>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('slider');
            const slides = document.querySelectorAll('.card-slide');
            const totalSlides = slides.length;
            let currentIndex = 0;

            // Function to move to next card
            function nextSlide() {
                // Move to the next slide
                currentIndex = (currentIndex + 1) % totalSlides; // Loop back to 0 when we reach the last slide
                const offset = -currentIndex * (slides[0].offsetWidth +
                    24); // Calculate the offset for the slide transition
                slider.style.transition = "transform 1s ease-in-out"; // Smooth transition
                slider.style.transform = `translateX(${offset}px)`;
            }

            // Set interval for auto sliding every 3 seconds
            setInterval(nextSlide, 3000); // Auto-slide every 3 seconds

            // Ensure that the sliding restarts from the first card without showing a jump
            slider.addEventListener('transitionend', () => {
                if (currentIndex === totalSlides - 1) {
                    // After reaching the last card, reset to the first card immediately
                    setTimeout(() => {
                        slider.style.transition =
                            "none"; // Remove transition temporarily to jump back to the first card
                        slider.style.transform = `translateX(0)`; // Jump to the first card
                        currentIndex = 0; // Reset index to 0
                        // Re-enable transition after a small delay
                        setTimeout(() => {
                            slider.style.transition =
                                "transform 1s ease-in-out"; // Enable transition again
                        }, 50);
                    }, 100); // Small delay before resetting
                }
            });
        });

        var swiper = new Swiper(".default-carousel", {
            loop: true,
            autoplay: {
                delay: 0, // No delay between slides
                disableOnInteraction: false, // Continue autoplay even when interacting with the slider
            },
            speed: 15000, // Set transition speed (in ms). Adjust to make the transition slower (e.g., 2000ms = 2 seconds)
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        document.addEventListener("DOMContentLoaded", () => {
            const slider = document.getElementById("productSlider");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");

            const scrollAmount = 200; // Jarak scroll dalam pixel
            let isDragging = false;
            let startX;
            let scrollLeft;

            // Tombol Prev
            prevBtn.addEventListener("click", () => {
                slider.scrollBy({
                    left: -scrollAmount,
                    behavior: "smooth",
                });
            });

            // Tombol Next
            nextBtn.addEventListener("click", () => {
                slider.scrollBy({
                    left: scrollAmount,
                    behavior: "smooth",
                });
            });

            // Event untuk Drag
            slider.addEventListener("mousedown", (e) => {
                isDragging = true;
                slider.classList.add("dragging");
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });

            slider.addEventListener("mouseleave", () => {
                isDragging = false;
                slider.classList.remove("dragging");
            });

            slider.addEventListener("mouseup", () => {
                isDragging = false;
                slider.classList.remove("dragging");
            });

            slider.addEventListener("mousemove", (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2; // Kecepatan scroll
                slider.scrollLeft = scrollLeft - walk;
            });
        });
    </script>


</body>

</html>
