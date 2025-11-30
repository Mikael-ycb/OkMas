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
            $table->string('nama_pasien');
            $table->string('klaster');
            $table->date('tanggal_periksa');
            $table->foreignId('janji_temu_id')->nullable()->constrained();
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periksa');
    }
};
