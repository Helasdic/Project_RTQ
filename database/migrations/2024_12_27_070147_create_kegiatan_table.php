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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('foto_kegiatan'); // URL atau path untuk foto kegiatan
            $table->string('nama_kegiatan');
            $table->string('periode_kegiatan');
            $table->string('link_youtube')->nullable(); // Opsional
            $table->string('link_sosmed')->nullable(); // Opsional
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
        Schema::dropIfExists('kegiatan');
    }
};
