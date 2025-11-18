<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('klasters')->insert([
            ['nama' => 'Umum', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gigi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Bidan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
