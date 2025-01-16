<?php

namespace App\Http\Controllers;

use App\Models\OrangTuaLolos;
use App\Models\Sekolah;
use App\Models\SekolahLolos;
use App\Models\Siswa;
use App\Models\SiswaLolos;
use App\Models\WaliSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiswaLolosController extends Controller
{
    //View
    public function viewLolos (Request $request){
        $id = $request->input('id');

        $getSantri = SiswaLolos::with('sekolah_lolos', 'orang_tua_lolos')->where('id',$id)->first();
        // dd($getSantri);

        return view('dashboard.modal_santri.viewSantri', compact('getSantri'));
    }

    //Edit


    //Delete
    public function deleteLolos(Request $request, $id){
        $siswa = SiswaLolos::findOrFail($id);

        $cek = $siswa -> nik;

        $sekolah = SekolahLolos::where('nik_siswa', $cek);
        $orangtua = OrangTuaLolos::where('nik_siswa', $cek);

        // Hapus data siswa
        $siswa->delete();
        $sekolah->delete();
        $orangtua->delete();

        if ($siswa && $sekolah && $orangtua) {
            return Redirect::back()->with('success', 'Data Berhasil Dihapus');
        } else {
            return Redirect::back()->with('warning', 'Data Gagal Dihapus');
        }
    }

    //Batal Lolos
    public function batalLolos(Request $request, $id){
        $data_ambil = SiswaLolos::with('sekolah_lolos', 'orang_tua_lolos')->where('id', $id)->first();
        // dd($data_ambil);

        //data siswa
        $nama_lengkap = $data_ambil -> nama_lengkap;
        $nama_panggilan = $data_ambil -> nama_panggilan;
        $jenis_kelamin = $data_ambil -> jenis_kelamin;
        $tempat_lahir = $data_ambil -> tempat_lahir;
        $tanggal_lahir = $data_ambil -> tanggal_lahir;
        $alamat_lengkap = $data_ambil -> alamat_lengkap;
        $nik = $data_ambil -> nik;
        $anak_ke = $data_ambil -> anak_ke;
        $jumlah_saudara_kandung = $data_ambil -> jumlah_saudara_kandung;
        $kk = $data_ambil -> kartu_keluarga;
        $akta = $data_ambil -> akta_kelahiran;

        //data orang tua
        $nama_ayah = $data_ambil -> orang_tua_lolos -> nama_ayah;
        $pekerjaan_ayah = $data_ambil -> orang_tua_lolos -> pekerjaan_ayah;
        $pendidikan_ayah = $data_ambil -> orang_tua_lolos -> pendidikan_ayah;
        $alamat_ayah = $data_ambil -> orang_tua_lolos -> alamat_ayah;

        $nama_ibu = $data_ambil -> orang_tua_lolos -> nama_ibu;
        $pekerjaan_ibu = $data_ambil -> orang_tua_lolos -> pekerjaan_ibu;
        $pendidikan_ibu = $data_ambil -> orang_tua_lolos -> pendidikan_ibu;
        $alamat_ibu = $data_ambil -> orang_tua_lolos -> alamat_ibu;

        //data sekolah
        $asal_sekolah = $data_ambil -> sekolah_lolos -> asal_sekolah;
        $alamat_sekolah = $data_ambil -> sekolah_lolos -> alamat_sekolah;
        $nisn = $data_ambil -> sekolah_lolos -> nisn;
        $npsn = $data_ambil -> sekolah_lolos -> npsn;

        try{
            $data_siswa = [
                // Simpan data siswa ke database
                'nama_lengkap' => $nama_lengkap,
                'nama_panggilan' => $nama_panggilan,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat_lengkap' => $alamat_lengkap,
                'nik' => $nik,
                'anak_ke' => $anak_ke,
                'jumlah_saudara_kandung' => $jumlah_saudara_kandung,
                'kartu_keluarga' => $kk,
                'akta_kelahiran' => $akta
            ];
    
            $simpan_data_siswa = Siswa::create($data_siswa);
    
            // Simpan data sekolah ke database
            $data_sekolah = [
                'nik_siswa' => $nik,
                'asal_sekolah' => $asal_sekolah,
                'alamat_sekolah' => $alamat_sekolah,
                'nisn' => $nisn,
                'npsn' => $npsn
            ];
            $simpan_data_sekolah = Sekolah::create($data_sekolah);
    
            // Simpan data orang tua ke database
            $data_orangtua = [
                'nik_siswa' => $nik,
                'nama_ayah' => $nama_ayah,
                'pekerjaan_ayah' => $pekerjaan_ayah,
                'pendidikan_ayah' => $pendidikan_ayah,
                'alamat_ayah' => $alamat_ayah,
                'nama_ibu' => $nama_ibu,
                'pekerjaan_ibu' => $pekerjaan_ibu,
                'pendidikan_ibu' => $pendidikan_ibu,
                'alamat_ibu' => $alamat_ibu
            ];
            // dd($data_orangtua);

            $simpan_data_orangtua = WaliSiswa::create($data_orangtua);

            $siswa = SiswaLolos::findOrFail($id);

            $cek = $siswa -> nik;

            $sekolah = SekolahLolos::where('nik_siswa', $cek);
            $orangtua = OrangTuaLolos::where('nik_siswa', $cek);

            // dd($orangtua);

            // Hapus data siswa
            $siswa->delete();
            $sekolah->delete();
            $orangtua->delete();
    
            return Redirect::back()->with('success', 'Data Berhasil Disimpan');
            
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning'=> 'Data Gagal Simpan'.$e->getMessage()]);
        }
    }
}
