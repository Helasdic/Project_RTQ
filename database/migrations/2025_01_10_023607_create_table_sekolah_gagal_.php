<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah_gagal', function (Blueprint $table) {
            $table->id();
            $table->string('nik_siswa');
            $table->string('asal_sekolah')->nullable();
            $table->text('alamat_sekolah')->nullable();
            $table->string('nisn')->nullable();
            $table->string('npsn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_sekolah_gagal_');
    }
};
