<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periksa;

class PeriksaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Klaster Umum
            ['nama_pasien' => 'Pujo Puspito Kusumo', 'klaster' => 'Umum', 'tanggal_periksa' => '2025-11-05', 'status' => 'Tidak Aktif'],
            ['nama_pasien' => 'Mahendra Bima', 'klaster' => 'Umum', 'tanggal_periksa' => '2025-11-05', 'status' => 'Aktif'],
            ['nama_pasien' => 'Cristiano Ponaldo', 'klaster' => 'Umum', 'tanggal_periksa' => '2025-11-06', 'status' => 'Tidak Aktif'],

            // Klaster Gigi dan Mulut
            ['nama_pasien' => 'Rosa Asap', 'klaster' => 'Gigi dan Mulut', 'tanggal_periksa' => '2025-11-06', 'status' => 'Aktif'],
            ['nama_pasien' => 'Michael Lordan', 'klaster' => 'Gigi dan Mulut', 'tanggal_periksa' => '2025-11-06', 'status' => 'Aktif'],

            // Klaster Bidan
            ['nama_pasien' => 'Bima Krisna', 'klaster' => 'Bidan', 'tanggal_periksa' => '2025-11-07', 'status' => 'Aktif'],
            ['nama_pasien' => 'Lionel Lessi', 'klaster' => 'Bidan', 'tanggal_periksa' => '2025-11-07', 'status' => 'Tidak Aktif'],
        ];

        foreach ($data as $item) {
            Periksa::create($item);
        }
    }
}
