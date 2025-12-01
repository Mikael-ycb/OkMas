<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periksa', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('id_akun'); // Wajib!
    $table->string('nama_pasien');
    $table->string('klaster');
    $table->date('tanggal_periksa');
    $table->foreignId('janji_temu_id')->constrained()->onDelete('cascade');
    $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
    $table->timestamps();
});



    }

    public function down(): void
    {
        Schema::dropIfExists('periksa');
    }
};
