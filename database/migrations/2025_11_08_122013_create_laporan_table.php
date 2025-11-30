<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('laporan', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('id_akun'); // FK ke akun
    $table->string('nama_pasien');           // dapat dari akun
    $table->string('nik');                   // dapat dari akun
    $table->date('tanggal')->nullable();
    $table->string('jenis_pemeriksaan')->nullable();
    $table->text('hasil_pemeriksaan')->nullable();
    $table->text('anamnesis')->nullable();
    $table->string('tekanan_darah')->nullable();
    $table->text('riwayat_penyakit_sekarang')->nullable();
    $table->text('riwayat_penyakit_dahulu')->nullable();
    $table->text('riwayat_penyakit_keluarga')->nullable();
    $table->text('riwayat_kebiasaan')->nullable();
    $table->text('anamnesis_organ')->nullable();
    $table->timestamps();

    $table->foreign('id_akun')
              ->references('id_akun')
              ->on('akun')
              ->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
