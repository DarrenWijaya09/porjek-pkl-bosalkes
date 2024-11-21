@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pesan Kontak</h2>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td class="px-4 py-2 border">{{ $contact->name }}</td>
                        <td class="px-4 py-2 border">{{ $contact->email }}</td>
                        <td class="px-4 py-2 border">{{ $contact->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Lihat</a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Tidak ada pesan kontak.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
