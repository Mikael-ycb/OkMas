<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_pasien' => 'Mahendra Bima',
                'nik' => '13155111233117',
                'tanggal' => '2025-09-18',
                'jenis_pemeriksaan' => 'Gigi',
                'anamnesis' => 'Sakit perut',
                'tekanan_darah' => '120/80 mmHg',
                'riwayat_penyakit_sekarang' => 'Sakit perut di ulu hati menjalar ke kiri atas...',
                'riwayat_penyakit_dahulu' => '(+) Sejak 4 tahun yang lalu',
                'riwayat_penyakit_keluarga' => '-',
                'riwayat_kebiasaan' => 'Makan tidak teratur, merokok, sering makan pedas',
                'anamnesis_organ' => 'Nyeri epigastrium, mual, muntah, vertigo',
            ],
            [
                'nama_pasien' => 'Pujo Puspito Kusumo',
                'nik' => '2211234756423',
                'tanggal' => '2025-09-25',
                'jenis_pemeriksaan' => 'Gigi',
                'anamnesis' => 'Sakit gigi dan gusi bengkak',
                'tekanan_darah' => '118/79 mmHg',
                'riwayat_penyakit_sekarang' => 'Gigi berlubang dan nyeri saat makan',
                'riwayat_penyakit_dahulu' => 'Pernah sakit gigi 2 tahun lalu',
                'riwayat_penyakit_keluarga' => 'Tidak ada',
                'riwayat_kebiasaan' => 'Jarang gosok gigi malam',
                'anamnesis_organ' => 'Nyeri tekan pada molar kanan bawah',
            ],
        ];

        foreach ($data as $item) {
            Laporan::create($item);
        }
    }
}
