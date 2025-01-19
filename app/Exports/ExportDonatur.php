<?php

namespace App\Exports;

use App\Models\Donatur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDonatur implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $getDonatur = Donatur::all();
        return $getDonatur;
    }

    public function headings(): array
    {
        return [
            'Nomor',
            'nama lengkap',
            'jenis kelamin',
            'Alamat',
            'Tanggal',
            'Nominal',
            'Jenis Donasi',
            'Bukti Donasi',
        ];
    }
}
