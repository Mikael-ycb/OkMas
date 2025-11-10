<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DokterSeeder::class,
            TanggalSeeder::class,
            KlasterSeeder::class,
            LaporanSeeder::class,
            BeritaSeeder::class,
            PeriksaSeeder::class,
            UserSeeder::class,
            ObatSeeder::class,
        ]);
    }
}
