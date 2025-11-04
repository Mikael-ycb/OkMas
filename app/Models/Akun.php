<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;

    protected $table = 'akun';

    protected $fillable = [
        'nik',
        'username', // kalau kamu pakai kolom "id" lain selain auto_increment, sesuaikan
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
