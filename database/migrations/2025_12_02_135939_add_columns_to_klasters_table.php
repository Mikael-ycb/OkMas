<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('klasters', function (Blueprint $table) {
            $table->string('jenis')->nullable()->after('nama');
            $table->text('deskripsi')->nullable()->after('jenis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klasters', function (Blueprint $table) {
            $table->dropColumn(['jenis', 'deskripsi']);
        });
    }
};
