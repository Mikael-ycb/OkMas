<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        Akun::create([
            'nama' => 'Admin OKMAS',
            'nik' => '0000000000000001',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'pekerjaan' => 'Administrator',
            'status' => 'Menikah',
            'no_telepon' => '081234567890',
            'alamat' => 'Jl. Pesanggrahan No. 2, Candiroto',
            'role' => 'admin',
        ]);

        // Pasien contoh
        Akun::create([
            'nama' => 'Mahendra Bima',
            'nik' => '1315611233117',
            'username' => 'bima',
            'password' => Hash::make('bima123'),
            'tanggal_lahir' => '2005-09-25',
            'jenis_kelamin' => 'Laki-laki',
            'pekerjaan' => 'Mahasiswa',
            'status' => 'Belum Menikah',
            'no_telepon' => '082334556644',
            'alamat' => 'Temanggung, Jawa Tengah',
            'role' => 'pasien',
        ]);
    }
}
