@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-[#14afaa] mb-4">{{ $aboutData['companyName'] }}</h1>
        <p class="text-lg text-gray-600">{{ $aboutData['description'] }}</p>
    </div>

    <!-- Categories Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-center text-[#14afaa] mb-6">Produk Kami</h2>
        <ul class="grid grid-cols-2 md:grid-cols-3 gap-6 text-gray-800">
            @foreach ($aboutData['categories'] as $category)
            <li class="flex items-center space-x-3 bg-white shadow-md p-4 rounded-md hover:shadow-lg transition">
                <div class="bg-gradient-to-r from-[#53c076] to-[#14afaa] p-2 rounded-full">
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7l-4-4m0 0l-4 4m4-4v18" />
                    </svg>
                </div>
                <span class="text-gray-700">{{ $category }}</span>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Facts Section -->
    <div class="bg-gradient-to-r from-[#f9fafb] to-[#f3f4f6] p-8 rounded-lg shadow-md my-12">
        <h2 class="text-3xl font-bold text-center text-[#14afaa] mb-6">Fakta Perusahaan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach ($aboutData['facts'] as $key => $value)
            <div class="text-center">
                <div class="bg-gradient-to-r from-[#53c076] to-[#14afaa] w-16 h-16 mx-auto flex items-center justify-center rounded-full text-white text-2xl font-bold shadow-md">
                    {{ $loop->iteration }}
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">{{ $value }}</h3>
                <p class="text-gray-600">{{ $key }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-center text-[#14afaa] mb-6">Portofolio</h2>
        <p class="text-justify text-gray-700 leading-relaxed bg-white p-6 shadow-md rounded-lg">
            {{ $aboutData['portfolioDescription'] }}
        </p>
    </div>

    <!-- Contact Section -->
    <div class="mt-12">
        <h2 class="text-3xl font-bold text-center text-[#14afaa] mb-6">Kontak Perusahaan</h2>
        <div class="text-center text-gray-700 mb-6">
            <p>{{ $aboutData['address'] }}</p>
        </div>
        <div class="flex justify-center">
            <iframe
                src="{{ $aboutData['mapEmbedUrl'] }}"
                class="rounded-lg shadow-lg"
                width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</div>
@endsection
