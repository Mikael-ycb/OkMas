<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien'); // relasi ke akun
            $table->unsignedBigInteger('id_obat');   // relasi ke obat
            $table->integer('jumlah');               // berapa butir / tablet / ml
            $table->string('aturan_pakai');          // contoh: 3x sehari
            $table->date('tanggal_resep');
            $table->timestamps();

            $table->foreign('id_pasien')->references('id_akun')->on('akun')->onDelete('cascade');
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};
