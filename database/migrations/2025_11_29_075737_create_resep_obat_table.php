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

            $table->unsignedBigInteger('laporan_id'); // terhubung ke rekam medis
            $table->unsignedBigInteger('id_akun');    // pasien

            $table->string('dokter')->nullable();  // kalau mau catat nama dokter
            $table->date('tanggal')->nullable();

            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');
            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};
