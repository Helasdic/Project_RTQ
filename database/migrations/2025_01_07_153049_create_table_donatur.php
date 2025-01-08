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
        Schema::create('table_donatur', function (Blueprint $table) {
            $table->id();
            $table->string('nama_donatur');
            $table->enum('jenis_kelamin_donatur', ['Laki-Laki', 'Perempuan']);
            $table->text('alamat_donatur')->nullable();
            $table->date('tanggal_donasi');
            $table->decimal('nominal_donasi', 15, 2); // Presisi untuk angka desimal
            $table->enum('jenis_donasi', ['Tunai', 'Non-Tunai']);
            $table->string('foto_donasi')->nullable(); // Menyimpan path/URL foto
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
        Schema::dropIfExists('table_donatur');
    }
};
