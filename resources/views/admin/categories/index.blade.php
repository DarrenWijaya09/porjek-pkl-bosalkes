@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Daftar Kategori</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('admin.categories.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">
                Tambah Kategori
            </a>
        </div>

        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">Nama Kategori</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="border px-4 py-2">{{ $category->name }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                Edit
                            </a> |
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
