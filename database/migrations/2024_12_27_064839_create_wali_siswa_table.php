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
        Schema::create('wali_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('pendidikan_ayah');
            $table->text('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ibu');
            $table->text('alamat_ibu');
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
        Schema::dropIfExists('wali_siswa');
    }
};
