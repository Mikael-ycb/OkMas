<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KlasterSeeder::class,
            DokterSeeder::class,
            TanggalSeeder::class,
            LaporanSeeder::class,
            BeritaSeeder::class,
            PeriksaSeeder::class,
            ObatSeeder::class,
        ]);
    }
}
