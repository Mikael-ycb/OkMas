<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Akun::create([
            'nik' => '1234567890123456',
            'username' => 'admin01',
            'password' => Hash::make('password123'),
        ]);
    }
}
