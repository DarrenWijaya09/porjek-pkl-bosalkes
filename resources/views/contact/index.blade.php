@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center mb-6 text-[#14afaa]">Hubungi Kami</h1>

        <!-- Tambahkan Maps di atas -->
        <div class="mb-6">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.453012543351!2d106.73341921413606!3d-6.208570995501154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4c3c123123%3A0x123456789abcdef!2sGreenlake%20City!5e0!3m2!1sen!2sid!4v1690000000000!5m2!1sen!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Grid untuk Konten Hubungi Kami -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bagian Kiri: Informasi Kontak -->
            <div class="bg-gray-100 p-6 rounded shadow-md h-full">
                <h2 class="text-2xl font-bold mb-4">BOSALKES</h2>
                <p class="text-gray-700 mb-4">
                    <strong>Alamat:</strong><br>
                    Ruko New Castle Blok B-56 Jln. Greenlake City, Petir,<br>
                    Cipondoh Tangerang Kota, 15147 Jakarta Barat,<br>
                    DKI Jakarta, Indonesia
                </p>
                <p class="mb-4">
                    <a href="tel:+62" class="text-[#14afaa] font-semibold">
                        <i class="fas fa-phone-alt mr-2"></i> Hubungi dengan Telepon
                    </a>
                </p>
                <p>
                    <a href="https://wa.me/62" class="text-[#14afaa] font-semibold">
                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp - Klik untuk Chat
                    </a>
                </p>
            </div>

            <!-- Bagian Kanan: Formulir Kontak -->
            <div class="bg-white p-6 rounded shadow-md h-full">
                <!-- Pesan Flash -->
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" class="h-full">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block font-bold mb-1">Nama Anda *</label>
                        <input type="text" name="name" id="name"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            placeholder="Masukkan nama Anda"
                            value="{{ auth()->check() ? auth()->user()->name : old('name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block font-bold mb-1">Email Anda *</label>
                        <input type="email" name="email" id="email"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            placeholder="Masukkan email Anda"
                            value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                            {{ auth()->check() ? 'readonly' : 'required' }}>
                    </div>

                    <div class="mb-4">
                        <label for="company" class="block font-bold mb-1">Nama Perusahaan</label>
                        <input type="text" name="company" id="company"
                            class="w-full border-gray-300 rounded-lg shadow-sm"
                            placeholder="Masukkan nama perusahaan (opsional)">
                    </div>

                    <div class="mb-4">
                        <label for="country" class="block font-bold mb-1">Negara</label>
                        <input type="text" name="country" id="country"
                            class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Masukkan negara">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block font-bold mb-1">Telepon Anda *</label>
                        <input type="text" name="phone" id="phone"
                            class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Masukkan nomor telepon Anda"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="block font-bold mb-1">Pesan Pertanyaan *</label>
                        <textarea name="message" id="message" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm"
                            placeholder="Masukkan pesan atau pertanyaan Anda" required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#14afaa] text-white py-2 rounded-lg font-bold hover:bg-[#0d8f89]">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
