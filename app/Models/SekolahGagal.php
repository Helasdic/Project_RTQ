<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahGagal extends Model
{
    use HasFactory;

    protected $table = 'sekolah_gagal';

    protected $fillable = [
        'nik_siswa',
        'asal_sekolah',
        'alamat_sekolah',
        'nisn',
        'npsn'
    ];
}
