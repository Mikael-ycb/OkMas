<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifikasi_pasien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id')->nullable();
            $table->unsignedBigInteger('berita_id');
            $table->string('judul');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_pasien');
    }
};
