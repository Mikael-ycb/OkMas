<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        // ASUMSI: Klaster::where('nama', 'Umum')->first()->id adalah 1, Bidan adalah 3, dst.
        DB::table('dokters')->insert([
            ['nama_dokter' => 'dr. Pujo Puspito Kusumo, M.Kes', 'id_dokter' => '2211234756423', 'klaster_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'dr. Dimas Ramadhan', 'id_dokter' => '2211234756424', 'klaster_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'dr. Siti Haryani', 'id_dokter' => '2211234756425', 'klaster_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Mahendra Bima', 'id_dokter' => '1315611233117', 'klaster_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Ratna Kusuma', 'id_dokter' => '1315611233119', 'klaster_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Aulia Fitria', 'id_dokter' => '1315611233120', 'klaster_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Reza Asap, A.Md.Keb', 'id_dokter' => '1315611233118', 'klaster_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Sari Puspita, A.Md.Keb', 'id_dokter' => '1315611233121', 'klaster_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Rina Marlina, A.Md.Keb', 'id_dokter' => '1315611233122', 'klaster_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ]);
    }
}
