<!DOCTYPE html>
<html lang="id">

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
</head>

<body class="bg-gray-100">
    <!-- Sidebar and Main Content Wrapper -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-600 text-white p-5">
            <h2 class="text-2xl font-semibold mb-10">Admin</h2>
            <ul class="space-y-6">
                <!-- Dashboard -->
                <li><a href="{{ route('admin.dashboard') }}"
                        class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard</a></li>
                <!-- Categories -->
                <li><a href="{{ route('admin.categories.index') }}"
                        class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-box-open mr-3"></i> Kategori</a></li>
                <!-- Products -->
                <li><a href="{{ route('admin.product.index') }}"
                        class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-cogs mr-3"></i> Produk</a></li>
                <!-- Contacts -->
                <li><a href="{{ route('admin.contacts.index') }}"
                        class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-lg transition duration-300">
                        <i class="fas fa-envelope mr-3"></i> Kontak</a></li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-semibold text-gray-800">Admin Dashboard</h1>
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-3">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Content Area -->
            @yield('content')
        </div>
    </div>
</body>

</html>
