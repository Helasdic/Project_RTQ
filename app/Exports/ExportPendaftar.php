<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPendaftar implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $getPendaftar = Siswa::with(['walisiswa','sekolah'])->get();
        return $getPendaftar;
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
