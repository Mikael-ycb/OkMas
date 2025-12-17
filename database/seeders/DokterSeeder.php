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
            ['nama_dokter' => 'dr. Pujo Puspito Kusumo, M.Kes', 'id_dokter' => '2211234756423', 'photo' => 'img/dokterUmum.jpg', 'klaster_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'dr. Dimas Ramadhan', 'id_dokter' => '2211234756424', 'photo' => 'img/PediatricCardiology.jpeg', 'klaster_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'dr. Siti Haryani', 'id_dokter' => '2211234756425', 'photo' => 'img/dokterDua.jpg', 'klaster_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Mahendra Bima', 'id_dokter' => '1315611233117', 'photo' => 'img/PediatricCardiology.jpg', 'klaster_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Ratna Kusuma', 'id_dokter' => '1315611233119', 'photo' => 'img/dokter.jpg', 'klaster_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'drg. Aulia Fitria', 'id_dokter' => '1315611233120', 'photo' => 'img/.jpg', 'klaster_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Reza Asap, A.Md.Keb', 'id_dokter' => '1315611233118', 'photo' => 'img/PediatricCardiology.jpg', 'klaster_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Sari Puspita, A.Md.Keb', 'id_dokter' => '1315611233121', 'photo' => 'img/dokterUmum.jpg', 'klaster_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_dokter' => 'Bidan Rina Marlina, A.Md.Keb', 'id_dokter' => '1315611233122', 'photo' => 'img/dokterGigi.jpg', 'klaster_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ]);
    }
}
