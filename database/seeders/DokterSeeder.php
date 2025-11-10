<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dokters')->insert([
            // Klaster Umum
            ['nama_dokter' => 'dr. Pujo Puspito Kusumo, M.Kes', 'id_dokter' => '2211234756423', 'klaster' => 'Umum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'dr. Cristiano Pranata', 'id_dokter' => '2211234756424', 'klaster' => 'Umum', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Klaster Gigi dan Mulut
            ['nama_dokter' => 'drg. Mahendra Bima', 'id_dokter' => '1315611233117', 'klaster' => 'Gigi dan Mulut', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Michael Lordan', 'id_dokter' => '2211234756425', 'klaster' => 'Gigi dan Mulut', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Klaster Bidan
            ['nama_dokter' => 'Bidan Reza Asap, A.Md.Keb', 'id_dokter' => '1315611233118', 'klaster' => 'Bidan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Bima Krisna, S.Tr.Keb', 'id_dokter' => '1315611233119', 'klaster' => 'Bidan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Lionel Lessi, M.Keb', 'id_dokter' => '1315611233120', 'klaster' => 'Bidan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
