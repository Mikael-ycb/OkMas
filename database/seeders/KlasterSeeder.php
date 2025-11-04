<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('klasters')->insert([
            ['nama' => 'Bidan'],
            ['nama' => 'Dokter Gigi dan Mulut'],
            ['nama' => 'Dokter Umum'],
        ]);
    }
}
