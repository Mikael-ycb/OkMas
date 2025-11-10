<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ObatSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel obat.
     */
    public function run(): void
    {
        DB::table('obat')->insert([
            [
                'nama_obat' => 'Paracetamol',
                'dosis' => '500 mg',
                'penyakit' => 'Demam, sakit kepala',
                'exp' => '12/2026',
                'stok' => 120,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obat' => 'Amoxicillin',
                'dosis' => '500 mg',
                'penyakit' => 'Infeksi bakteri',
                'exp' => '06/2025',
                'stok' => 80,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obat' => 'Cetirizine',
                'dosis' => '10 mg',
                'penyakit' => 'Alergi',
                'exp' => '03/2027',
                'stok' => 75,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obat' => 'Ibuprofen',
                'dosis' => '200 mg',
                'penyakit' => 'Nyeri, peradangan',
                'exp' => '11/2026',
                'stok' => 120,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obat' => 'Metformin',
                'dosis' => '500 mg',
                'penyakit' => 'Diabetes',
                'exp' => '09/2025',
                'stok' => 55,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obat' => 'Omeprazole',
                'dosis' => '20 mg',
                'penyakit' => 'Maag, asam lambung',
                'exp' => '01/2027',
                'stok' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_obat' => 'Salbutamol',
                'dosis' => '2 mg',
                'penyakit' => 'Asma, sesak napas',
                'exp' => '04/2026',
                'stok' => 65,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
