<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TanggalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tanggals')->insert([
            ['tanggal' => '2025-08-19'],
            ['tanggal' => '2025-08-20'],
            ['tanggal' => '2025-08-21'],
            ['tanggal' => '2025-08-22'],
        ]);
    }
}
