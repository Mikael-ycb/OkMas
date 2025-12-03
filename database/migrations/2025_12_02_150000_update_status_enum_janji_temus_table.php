<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            // Change enum to string untuk SQLite compatibility
            $table->string('status')->default('belum_dimulai')->change();
        });
    }

    public function down(): void
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            $table->string('status')->default('Tidak Aktif')->change();
        });
    }
};
