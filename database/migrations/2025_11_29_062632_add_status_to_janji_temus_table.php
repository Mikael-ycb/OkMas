<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Tidak Aktif');
        });
    }

    public function down()
    {
        Schema::table('janji_temus', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
