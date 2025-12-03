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
            $table->unsignedBigInteger('user_id')->nullable();  // nullable untuk broadcast ke semua
            $table->string('judul');
            $table->text('pesan')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            
            // Foreign key - nullable jika ingin broadcast ke semua
            $table->foreign('user_id')->references('id_akun')->on('akun')->onDelete('cascade');
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
