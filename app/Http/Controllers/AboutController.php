<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Data yang ingin ditampilkan di halaman Tentang Kami
        $aboutData = [
            'companyName' => 'BOSALKES',
            'description' => 'BOSALKES merupakan perusahaan penyedia alat kesehatan dan medis terpercaya di Indonesia. Kami menyediakan beragam kebutuhan peralatan kesehatan dan medis paling lengkap, dari alat kecil hingga perangkat canggih.',
            'categories' => [
                'Alat Kantong Oksigen',
                'Alat Kedokteran Gigi',
                'Alat Tes Urine',
                'Stetoskop',
                'Nebulizer',
                'Alat Kesehatan Elektronik',
                'Kursi Ranjang Pasien',
                'Perlengkapan Rumah Sakit Lainnya',
            ],
            'facts' => [
                'Tahun Terdaftar' => '2021',
                'Jumlah Karyawan' => '50+',
                'Lokasi Perusahaan' => 'Jakarta',
            ],
            'portfolioDescription' => 'BOSALKES telah dipercaya oleh berbagai pihak, termasuk rumah sakit swasta dan pemerintah, klinik, puskesmas, serta laboratorium di seluruh Indonesia.
        Kami menyediakan produk-produk berkualitas yang telah memenuhi standar nasional dan internasional.
        Dalam beberapa tahun terakhir, BOSALKES telah berkontribusi dalam pengadaan alat-alat medis untuk berbagai institusi kesehatan besar, seperti penyediaan ventilator, monitor pasien, dan peralatan laboratorium modern.
        Proyek-proyek besar yang telah kami tangani menunjukkan komitmen kami untuk memberikan solusi terbaik dalam pemenuhan kebutuhan alat kesehatan.

        Selain itu, BOSALKES terus meningkatkan layanan kami dengan menjalin kemitraan strategis dengan berbagai distributor dan prinsipal alat medis terkemuka.
        Dengan dukungan tim profesional yang berpengalaman, kami memastikan bahwa setiap klien mendapatkan produk yang sesuai dengan kebutuhan mereka, tepat waktu, dan dengan harga yang kompetitif.
        Kami bangga dapat menjadi bagian dari pengembangan layanan kesehatan di Indonesia melalui solusi alat medis yang inovatif dan terpercaya.',
            'address' => 'Rukan New Castle Blok B-56, Greenlake City, Cipondoh, Tangerang Kota, Jakarta Barat, Indonesia',
            'mapEmbedUrl' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.232077272388!2d106.69370031477347!3d-6.1751106955301945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTAnMzAuNCJTIDEwNsKwNDEnNDMuMiJF!5e0!3m2!1sen!2sid!4v1691234567890!5m2!1sen!2sid',
        ];

        // Mengarahkan ke view tentang kami dengan data
        return view('about.index', compact('aboutData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
