<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Pemeriksaan Kesehatan Gratis di Desa Candiroto',
                'program' => 'Program Kesehatan Masyarakat',
                'tanggal' => Carbon::parse('2025-10-15'),
                'isi' => 'Puskesmas Candiroto mengadakan pemeriksaan kesehatan gratis bagi masyarakat desa sekitar. Acara ini bertujuan untuk meningkatkan kesadaran hidup sehat dan mendeteksi penyakit sedini mungkin.',
                'gambar' => 'hehe1.jpg',
            ],
            [
                'judul' => 'Pelatihan Dokter Muda dalam Program OKMAS',
                'program' => 'OKMAS Training 2025',
                'tanggal' => Carbon::parse('2025-09-28'),
                'isi' => 'Pelatihan ini merupakan bagian dari komitmen OKMAS untuk mencetak tenaga medis profesional yang berkompeten dalam bidang kesehatan masyarakat.',
                'gambar' => 'hehe1.jpg',
            ],
            [
                'judul' => 'Sosialisasi Pentingnya Gizi Seimbang',
                'program' => 'Program Edukasi Gizi',
                'tanggal' => Carbon::parse('2025-08-12'),
                'isi' => 'Tim Puskesmas memberikan sosialisasi kepada warga mengenai pentingnya gizi seimbang dan pola makan sehat untuk mencegah stunting pada anak-anak.',
                'gambar' => 'hehe2.jpg',
            ],
        ];

        foreach ($data as $item) {
            Berita::create($item);
        }
    }
}
