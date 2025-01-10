<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaLolos extends Model
{
    use HasFactory;

    protected $table = 'siswa_lolos';

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

    public function sekolah_lolos() {
        return $this->belongsTo(SekolahLolos::class, 'nik', 'nik_siswa');
    }
    
    public function orang_tua_lolos() {
        return $this->belongsTo(OrangTuaLolos::class, 'nik','nik_siswa');
    }
}
