<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahLolos extends Model
{
    use HasFactory;

    protected $table = 'sekolah_lolos';

    protected $fillable = [
        'nik_siswa',
        'asal_sekolah',
        'alamat_sekolah',
        'nisn',
        'npsn'
    ];
}
