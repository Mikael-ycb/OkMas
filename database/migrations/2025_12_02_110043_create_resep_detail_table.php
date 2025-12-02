<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep_detail', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resep_id');
            $table->unsignedBigInteger('obat_id');

            $table->integer('jumlah');  // jumlah obat yang diberikan
            $table->text('aturan_pakai')->nullable();

            $table->foreign('resep_id')->references('id')->on('resep_obat')->onDelete('cascade');
            $table->foreign('obat_id')->references('id')->on('obat')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_detail');
    }
};
