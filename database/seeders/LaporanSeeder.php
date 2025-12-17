<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;
use App\Models\Akun;
use App\Models\JanjiTemu;
use App\Models\Dokter;
use App\Models\Tanggal;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil akun berdasarkan nik (biar matching)
        $akun1 = Akun::where('nik', '1315611233117')->first();
        $akun2 = Akun::where('nik', '1315611233118')->first();
        $akun3 = Akun::where('nik', '1315611233119')->first();

        // Kalau akun belum ada → hentikan
        if (!$akun1 || !$akun2) {
            dd("Akun pasien belum ada. Seeder Laporan tidak bisa dijalankan.");
        }

        // Ambil dokter, klaster, dan tanggal (untuk janji temu)
        $dokter = Dokter::first();
        $klaster = \App\Models\Klaster::first();
        $tanggal = Tanggal::first();

        if (!$dokter || !$klaster || !$tanggal) {
            dd("Dokter, Klaster, atau Tanggal belum ada. Silakan jalankan seeder terlebih dahulu.");
        }

        // Buat Janji Temu 1
        $janjiTemu1 = JanjiTemu::create([
            'id_akun' => $akun1->id_akun,
            'tanggal_id' => $tanggal->id,
            'klaster_id' => $klaster->id,
            'dokter_id' => $dokter->id,
            'keluhan' => 'Sakit perut di ulu hati',
            'nomor_antrian' => 1,
            'status' => 'Selesai'
        ]);

        // Buat Janji Temu 2
        $janjiTemu2 = JanjiTemu::create([
            'id_akun' => $akun2->id_akun,
            'tanggal_id' => $tanggal->id,
            'klaster_id' => $klaster->id,
            'dokter_id' => $dokter->id,
            'keluhan' => 'Sakit gigi dan gusi bengkak',
            'nomor_antrian' => 2,
            'status' => 'Selesai'
        ]);

        // Buat Janji Temu 3
        $janjiTemu3 = JanjiTemu::create([
            'id_akun' => $akun3->id_akun ?? $akun1->id_akun,
            'tanggal_id' => $tanggal->id,
            'klaster_id' => $klaster->id,
            'dokter_id' => $dokter->id,
            'keluhan' => 'Pemeriksaan rutin kesehatan',
            'nomor_antrian' => 3,
            'status' => 'Selesai'
        ]);

        // Buat Laporan 1 dengan link ke janji temu
        Laporan::create([
            'id_akun' => $akun1->id_akun,
            'nama_pasien' => $akun1->nama,
            'nik' => $akun1->nik,
            'janji_temu_id' => $janjiTemu1->id,
            'tanggal' => '2025-08-19',
            'jenis_pemeriksaan' => 'Umum',
            'diagnosa' => 'Gastritis akut dengan perdarahan minor',
            'hasil_pemeriksaan' => 'Sakit',
            'anamnesis' => 'Sakit perut',
            'tekanan_darah' => '120/80 mmHg',
            'saran' => 'Istirahat, hindari makanan pedas, minum obat sesuai resep',
            'riwayat_penyakit_sekarang' => 'Sakit perut di ulu hati menjalar ke kiri atas...',
            'riwayat_penyakit_dahulu' => '(+) Sejak 4 tahun yang lalu',
            'riwayat_penyakit_keluarga' => '-',
            'riwayat_kebiasaan' => 'Makan tidak teratur, merokok, sering makan pedas',
            'anamnesis_organ' => 'Nyeri epigastrium, mual, muntah, vertigo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat Laporan 2 dengan link ke janji temu
        Laporan::create([
            'id_akun' => $akun2->id_akun,
            'nama_pasien' => $akun2->nama,
            'nik' => $akun2->nik,
            'janji_temu_id' => $janjiTemu2->id,
            'tanggal' => '2025-08-25',
            'jenis_pemeriksaan' => 'Gigi',
            'diagnosa' => 'Karies gigi dengan infeksi ringan',
            'hasil_pemeriksaan' => 'Sakit',
            'anamnesis' => 'Sakit gigi dan gusi bengkak',
            'tekanan_darah' => '118/79 mmHg',
            'saran' => 'Pembersihan plak, penambalan, dan follow-up minggu depan',
            'riwayat_penyakit_sekarang' => 'Gigi berlubang dan nyeri saat makan',
            'riwayat_penyakit_dahulu' => 'Pernah sakit gigi 2 tahun lalu',
            'riwayat_penyakit_keluarga' => 'Tidak ada',
            'riwayat_kebiasaan' => 'Jarang gosok gigi malam',
            'anamnesis_organ' => 'Nyeri tekan pada molar kanan bawah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat Laporan 3 dengan link ke janji temu
        Laporan::create([
            'id_akun' => $janjiTemu3->id_akun,
            'nama_pasien' => ($akun3 ?? $akun1)->nama,
            'nik' => ($akun3 ?? $akun1)->nik,
            'janji_temu_id' => $janjiTemu3->id,
            'tanggal' => '2025-09-02',
            'jenis_pemeriksaan' => 'Umum',
            'diagnosa' => 'Sehat, tidak ada kelainan',
            'hasil_pemeriksaan' => 'Sehat',
            'anamnesis' => 'Pemeriksaan rutin kesehatan',
            'tekanan_darah' => '115/75 mmHg',
            'saran' => 'Lanjutkan gaya hidup sehat, olahraga rutin 3-4 kali seminggu',
            'riwayat_penyakit_sekarang' => '-',
            'riwayat_penyakit_dahulu' => '-',
            'riwayat_penyakit_keluarga' => '-',
            'riwayat_kebiasaan' => 'Aktif berolahraga',
            'anamnesis_organ' => 'Semua organ dalam kondisi baik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

