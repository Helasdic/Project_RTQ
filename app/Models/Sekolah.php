<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        'nik_siswa',
        'asal_sekolah',
        'alamat_sekolah',
        'nisn',
        'npsn'
    ];

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id_sekolah'); // Tetap hasMany
    }
}
