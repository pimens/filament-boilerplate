<?php

namespace Database\Seeders;

use App\Models\Opd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Sekretariat Daerah',
            'Bagian Umum',
            'Bagian Humas Dan Protokol',
            'Bagian Administrasi Pembangunan dan Kerjasama',
            'Bagian Bina Kesra',
            'Bagian Perekonomian',
            'Bagian Layanan Pengadaan',
            'Bagian Hukum',
            'Bagian Organisasi dan Tata Laksana',
            'Bagian Tata Pemerintahan',
            'Sekretariat DPRD',
            'Dinas Pendidikan',
            'Dinas Kepemudaan dan Olahraga',
            'Dinas Kearsipan dan Perpustakaan',
            'Dinas Pertanian',
            'Satuan Polisi Pamong Praja',
            'Dinas Komunikasi dan Informatika',
            'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',
            'Dinas Lingkungan Hidup',
            'Dinas Kesehatan',
            'Dinas Pekerjaan Umum dan Penataan Ruang',
            'Dinas Perumahan dan Kawasan Permukiman',
            'Dinas Ketahanan Pangan',
            'Dinas Kependudukan dan Pencatatan Sipil',
            'Dinas Pengendalian Penduduk dan Keluarga Berencana',
            'Dinas Perindustrian, Koperasi, Usaha Kecil dan Menengah',
            'Dinas Perdagangan',
            'Dinas Perikanan',
            'Dinas Sosial',
            'Dinas Tenaga Kerja',
            'Dinas Perhubungan',
            'Dinas Pariwisata',
            'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
            'Dinas Pemadam Kebakaran',
            'Inspektorat',
            'Badan Keuangan Daerah',
            'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia',
            'Badan Perencanaan Dan Pembangunan Daerah',
            'Badan Penelitian Dan Pengembangan',
            'Badan Kesatuan Bangsa dan Politik',
            'Badan Penanggulangan Bencana Daerah',
            'Badan Narkotika Nasional Kota',
            'Rumah Sakit Umum Daerah Kelas B',
            'Kecamatan Ampenan',
            'Kecamatan Sekarbela',
            'Kecamatan Selaparang',
            'Kecamatan Mataram',
            'Kecamatan Cakranegara',
            'Kecamatan Sandubaya',
            'Kelurahan Bintaro',
            'Kelurahan Ampenan Utara',
            'Kelurahan Dayan Peken',
            'Kelurahan Ampenan Tengah',
            'Kelurahan Banjar',
            'Kelurahan Ampenan Selatan',
            'Kelurahan Taman Sari',
            'Kelurahan Pejeruk',
            'Kelurahan Kebun Sari',
            'Kelurahan Pejarakan Karya',
            'Kelurahan Kekalik Jaya',
            'Kelurahan Tanjung Karang Permai',
            'Kelurahan Tanjung Karang',
            'Kelurahan Karang Pule',
            'Kelurahan Jempong Baru',
            'Kelurahan Rembiga',
            'Kelurahan Karang Baru',
            'Kelurahan Monjok Barat',
            'Kelurahan Monjok',
            'Kelurahan Monjok Timur',
            'Kelurahan Mataram Barat',
            'Kelurahan Gomong',
            'Kelurahan Dasan Agung',
            'Kelurahan Dasan Agung Baru',
            'Kelurahan Punia',
            'Kelurahan Pejanggik',
            'Kelurahan Mataram Timur',
            'Kelurahan Pagesangan Barat',
            'Kelurahan Pagesangan',
            'Kelurahan Pagesangan Timur',
            'Kelurahan Pagutan Barat',
            'Kelurahan Pagutan',
            'Kelurahan Pagutan Timur',
            'Kelurahan Cakranegara Barat',
            'Kelurahan Cilinaya',
            'Kelurahan Sapta Marga',
            'Kelurahan Mayura',
            'Kelurahan Cakranegara Timur',
            'Kelurahan Cakranegara Selatan',
            'Kelurahan Cakranegara Selatan Baru',
            'Kelurahan Cakranegara Utara',
            'Kelurahan Karang Taliwang',
            'Kelurahan Sayang-Sayang',
            'Kelurahan Selagalas',
            'Kelurahan Bertais',
            'Kelurahan Mandalika',
            'Kelurahan Babakan',
            'Kelurahan Turida',
            'Kelurahan Abian Tubuh Baru',
            'Kelurahan Dasan Cermen',
            'Puskesmas Ampenan',
            'Puskesmas Cakranegara',
            'Puskesmas Dasan Cermen',
            'Puskesmas Karang Pule',
            'Puskesmas Karang Taliwang',
            'Puskesmas Mataram',
            'Puskesmas Dasan Agung',
            'Puskesmas Pagesangan',
            'Puskesmas Tanjung Karang',
            'Puskesmas Selaparang',
            'Puskesmas Pejeruk',

         ];

         foreach ($permissions as $permission) {
              Opd::create(['nama_opd' => $permission]);
         }
    }
}
