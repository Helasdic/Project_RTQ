<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSiswa extends Model
{
    use HasFactory;

    protected $table = 'wali_siswa'; // Nama tabel
    protected $fillable = [
        'nama_ayah_wali',
        'pekerjaan_ayah_wali',
        'pendidikan_ayah_wali',
        'alamat_ayah_wali',
        'nama_ibu_wali',
        'pekerjaan_ibu_wali',
        'pendidikan_ibu_wali',
        'alamat_ibu_wali',
    ];

    // Relasi (jika diperlukan)
    public function siswa()
    {
        return $this->hasOne(Siswa::class); // Diasumsikan satu wali untuk satu siswa
    }
}
