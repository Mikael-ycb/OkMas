<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('janjiTemu', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_antrian')->nullable();
            $table->unsignedBigInteger('id_akun')->after('id');
            $table->foreign('id_akun')->references('id_akun')->on('akun')->onDelete('cascade');
            $table->foreignId('tanggal_id')->constrained('tanggals')->onDelete('cascade');
            $table->foreignId('klaster_id')->constrained('klasters')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
            $table->text('keluhan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('janjiTemu');
        Schema::table('janjiTemu', function (Blueprint $table) {
            $table->dropColumn('nomor_antrian');
        });
    }
};
