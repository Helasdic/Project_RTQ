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
        'nik',
        'anak_ke',
        'jumlah_saudara_kandung',
    ];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class, 'nik', 'nik_siswa');
    }
    
    public function walisiswa() {
        return $this->belongsTo(Walisiswa::class, 'nik','nik_siswa');
    }
}
