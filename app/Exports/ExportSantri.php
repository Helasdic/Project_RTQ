<?php

namespace App\Exports;

use App\Models\SiswaLolos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportSantri implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $getPendaftarLolos = SiswaLolos::with(['orang_tua_lolos','sekolah_lolos'])->get();
        return $getPendaftarLolos;
    }

    public function headings(): array
    {
        return [
            'Nomor',
            'nama lengkap',
            'panggilan',
            'jenis kelamin',
            'tempat lahir',
            'Tanggal Lahir',
            'Alamat',
            'Nomor KK',
            'nomor2',
            'nomor1',
            'kk',
            'Akta Kelahiran',
        ];
    }
}
