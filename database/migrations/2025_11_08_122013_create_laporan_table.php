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

            // Relasi ke tabel akun
            $table->unsignedBigInteger('id_akun'); 
            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');

            // Informasi pasien (cache)
            $table->string('nama_pasien');
            $table->string('nik', 20);

            // Tanggal & pemeriksaan
            $table->date('tanggal')->nullable();
            $table->string('jenis_pemeriksaan')->nullable();

            // Hasil & pemeriksaan umum
            $table->text('hasil_pemeriksaan')->nullable();
            $table->text('anamnesis')->nullable();
            $table->string('tekanan_darah')->nullable();

            // Diagnosa & tambahan medis
            $table->text('diagnosa')->nullable();
            $table->text('saran')->nullable();

            // Riwayat klinis tambahan
            $table->text('riwayat_penyakit_sekarang')->nullable();
            $table->text('riwayat_penyakit_dahulu')->nullable();
            $table->text('riwayat_penyakit_keluarga')->nullable();
            $table->text('riwayat_kebiasaan')->nullable();
            $table->text('anamnesis_organ')->nullable();

            // Dari Janji Temu (optional)
            $table->unsignedBigInteger('periksa_id')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
