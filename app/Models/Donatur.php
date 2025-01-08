<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'table_donatur';

    protected $fillable = [
        'nama_donatur',
        'jenis_kelamin_donatur',
        'alamat_donatur',
        'tanggal_donasi',
        'nominal_donasi',
        'jenis_donasi',
        'foto_donasi',
    ];
}
