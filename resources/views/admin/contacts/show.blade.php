@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Detail Pesan Kontak</h2>
        <div class="mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4zm-6 2a8 8 0 1116 0H4z" />
            </svg>
            <strong class="mr-2">Nama:</strong>
            <p>{{ $contact->name }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.3 2.3a1 1 0 011.4 0L10 8.586 16.3 2.3a1 1 0 011.4 1.4L11.414 10l6.293 6.293a1 1 0 01-1.4 1.4L10 11.414 3.707 17.707a1 1 0 01-1.4-1.4L8.586 10 2.3 3.707a1 1 0 010-1.4z" />
            </svg>
            <strong class="mr-2">Email:</strong>
            <p>{{ $contact->email }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm5 10a2 2 0 110-4 2 2 0 010 4z" />
            </svg>
            <strong class="mr-2">Company:</strong>
            <p>{{ $contact->company ?? '-' }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.667 6.36a8 8 0 014.666 0l.93-2.666a1 1 0 00-1.33-1.33L8 5.03 5.067 2.363a1 1 0 00-1.33 1.33l.93 2.666a8 8 0 013 0zM4 10.9V14a2 2 0 002 2h8a2 2 0 002-2v-3.1a8.001 8.001 0 01-12 0z" clip-rule="evenodd" />
            </svg>
            <strong class="mr-2">Country:</strong>
            <p>{{ $contact->country ?? '-' }}</p>
        </div>
        <div class="mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M2 5a3 3 0 013-3h10a3 3 0 013 3v10a3 3 0 01-3 3H5a3 3 0 01-3-3V5zm8 3a3 3 0 100 6 3 3 0 000-6z" clip-rule="evenodd" />
            </svg>
            <strong class="mr-2">Phone:</strong>
            <p>
                {{ $contact->phone }}
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $contact->phone) }}"
                   class="text-green-600 underline ml-4"
                   target="_blank">
                    Hubungi via WhatsApp
                </a>
            </p>
        </div>
        <div class="mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 3a3 3 0 00-3 3v8a3 3 0 003 3h8a3 3 0 003-3V6a3 3 0 00-3-3H6zm1 4h6v6H7V7z" clip-rule="evenodd" />
            </svg>
            <strong class="mr-2">Pesan:</strong>
            <p>{{ $contact->message }}</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
    </div>
</div>
@endsection
