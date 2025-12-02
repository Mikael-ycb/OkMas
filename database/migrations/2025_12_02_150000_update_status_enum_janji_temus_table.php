<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            // Ganti enum status dari 'Aktif/Tidak Aktif' ke 'belum_dimulai/dalam_proses/selesai'
            $table->enum('status', ['belum_dimulai', 'dalam_proses', 'selesai'])->default('belum_dimulai')->change();
        });
    }

    public function down(): void
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif')->change();
        });
    }
};
