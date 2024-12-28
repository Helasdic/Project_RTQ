<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'asal_sekolah',
        'alamat_sekolah',
        'nisn',
        'npsn',
        'anak_ke',
        'jumlah_saudara_kandung',
    ];

    public function waliSiswa()
    {
        return $this->belongsTo(WaliSiswa::class, 'wali_siswa_id');
    }
}
