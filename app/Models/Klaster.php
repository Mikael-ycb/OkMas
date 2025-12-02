<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klaster extends Model
{
    protected $fillable = ['nama', 'jenis', 'deskripsi'];

    public function dokters()
    {
        return $this->hasMany(Dokter::class);
    }
}
