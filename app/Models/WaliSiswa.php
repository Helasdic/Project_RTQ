<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSiswa extends Model
{
    use HasFactory;

    protected $table = 'wali_siswa'; // Nama tabel

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id_wali'); // Tetap hasMany
    }
}
