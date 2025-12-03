<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotifikasiPasien extends Model
{
    protected $table = 'notifikasi_pasien';

    protected $fillable = [
        'user_id',
        'berita_id',
        'judul',
        'pesan',
        'is_read'
    ];
}
