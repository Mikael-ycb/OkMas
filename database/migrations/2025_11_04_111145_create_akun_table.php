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
        Schema::create('akun', function (Blueprint $table) {
            $table->id('id_akun');
            $table->string('nik', 20)->unique(); // NIK unik
            $table->string('username')->unique(); // ID akun / username
            $table->string('password'); // password yang di-hash
            $table->enum('role', ['admin', 'pasien'])->default('pasien');
            $table->string('nama')->after('id_akun');
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('status')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
