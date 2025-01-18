<?php

namespace App\Exports;

use App\Models\SiswaLolos;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSantri implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $getPendaftarLolos = SiswaLolos::with(['orang_tua_lolos','sekolah_lolos'])->get();
        return $getPendaftarLolos;
    }
}
