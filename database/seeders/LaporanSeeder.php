<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;
use App\Models\Akun;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil akun berdasarkan nik (biar matching)
        $akun1 = Akun::where('nik', '1315611233117')->first();
        $akun2 = Akun::where('nik', '1315611233118')->first();

        // Kalau akun belum ada → hentikan
        if (!$akun1 || !$akun2) {
            dd("Akun pasien belum ada. Seeder Laporan tidak bisa dijalankan.");
        }

        Laporan::create([
            'id_akun' => $akun1->id_akun,
            'nama_pasien' => $akun1->nama,
            'nik' => $akun1->nik,
            'tanggal' => '2025-09-18',
            'jenis_pemeriksaan' => 'Gigi',
            'anamnesis' => 'Sakit perut',
            'tekanan_darah' => '120/80 mmHg',
            'riwayat_penyakit_sekarang' => 'Sakit perut di ulu hati menjalar ke kiri atas...',
            'riwayat_penyakit_dahulu' => '(+) Sejak 4 tahun yang lalu',
            'riwayat_penyakit_keluarga' => '-',
            'riwayat_kebiasaan' => 'Makan tidak teratur, merokok, sering makan pedas',
            'anamnesis_organ' => 'Nyeri epigastrium, mual, muntah, vertigo',
            'created_at' => now(),    // ⬅ wajib
            'updated_at' => now(),    // ⬅ wajib
        ]);

        Laporan::create([
            'id_akun' => $akun2->id_akun,
            'nama_pasien' => $akun2->nama,
            'nik' => $akun2->nik,
            'tanggal' => '2025-09-25',
            'jenis_pemeriksaan' => 'Gigi',
            'anamnesis' => 'Sakit gigi dan gusi bengkak',
            'tekanan_darah' => '118/79 mmHg',
            'riwayat_penyakit_sekarang' => 'Gigi berlubang dan nyeri saat makan',
            'riwayat_penyakit_dahulu' => 'Pernah sakit gigi 2 tahun lalu',
            'riwayat_penyakit_keluarga' => 'Tidak ada',
            'riwayat_kebiasaan' => 'Jarang gosok gigi malam',
            'anamnesis_organ' => 'Nyeri tekan pada molar kanan bawah',
            'created_at' => now(),    // ⬅ wajib
            'updated_at' => now(),    // ⬅ wajib
        ]);
    }
}

