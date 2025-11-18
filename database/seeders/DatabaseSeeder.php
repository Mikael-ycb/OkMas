<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KlasterSeeder::class,
            DokterSeeder::class,
            TanggalSeeder::class,
            LaporanSeeder::class,
            BeritaSeeder::class,
            PeriksaSeeder::class,
            UserSeeder::class,
            ObatSeeder::class,
        ]);
    }
}
