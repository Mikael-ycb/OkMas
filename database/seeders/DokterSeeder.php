<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dokters')->insert([
            ['nama' => 'dr. Nujab, M.M'],
            ['nama' => 'dr. Andrew Nugroho, M.M'],
            ['nama' => 'dr. Sumanto, M.M'],
        ]);
    }
}
