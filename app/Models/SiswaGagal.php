<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaGagal extends Model
{
    use HasFactory;

    protected $table = 'siswa_gagal';

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'nik',
        'anak_ke',
        'jumlah_saudara_kandung',
        'kartu_keluarga',
        'akta_kelahiran'
    ];

    public function sekolah_gagal() {
        return $this->belongsTo(SekolahGagal::class, 'nik', 'nik_siswa');
    }
    
    public function orang_tua_gagal() {
        return $this->belongsTo(OrangTuaGagal::class, 'nik','nik_siswa');
    }
}
