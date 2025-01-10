<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTuaGagal extends Model
{
    use HasFactory;

    protected $table = 'orang_tua_gagal'; // Nama tabel

    protected $fillable = [
        'nik_siswa',
        'nama_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'alamat_ibu'
    ];
}
