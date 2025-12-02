<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            // Tambah kolom janji_temu_id untuk tracking relasi
            if (!Schema::hasColumn('laporan', 'janji_temu_id')) {
                $table->unsignedBigInteger('janji_temu_id')->nullable()->after('periksa_id');
                $table->foreign('janji_temu_id')->references('id')->on('janji_temus')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropForeignKey(['janji_temu_id']);
            $table->dropColumn('janji_temu_id');
        });
    }
};
