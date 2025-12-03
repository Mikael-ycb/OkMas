<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;

    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'nik',
        'username',
        'password',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'status',
        'no_telepon',
        'alamat',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class, 'id_akun', 'id_akun');
    }

    public function laporan()
    {
        return $this->hasMany(\App\Models\Laporan::class, 'id_akun', 'id_akun');
    }

     public function resepObat()
    {
        return $this->hasMany(ResepObat::class, 'id_akun', 'id_akun');
    }
}
