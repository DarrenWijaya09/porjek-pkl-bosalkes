@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tambah Kategori Baru</h2>

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <!-- Input Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="mt-2 p-3 border border-gray-300 rounded-lg w-full" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="mt-2 p-3 border border-gray-300 rounded-lg w-full">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button Submit -->
                <div class="mb-4">
                    <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        Simpan Kategori
                    </button>
                </div>

                <div class="mb-4">
                    <a href="{{ route('admin.categories.index') }}" class="w-full py-3 px-6 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200 text-center">
                        Kembali ke Daftar Kategori
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
