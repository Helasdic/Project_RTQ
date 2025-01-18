<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Siswa;


class ExportPendaftar implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $getPendaftar = Siswa::with(['walisiswa','sekolah'])->get();
        return $getPendaftar;
    }
}
