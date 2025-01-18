<?php

namespace App\Http\Controllers;

use App\Exports\ExportPendaftar;
use Illuminate\Http\Request;
use App\Models\OrangTuaGagal;
use App\Models\OrangTuaLolos;
use App\Models\Sekolah;
use App\Models\SekolahGagal;
use App\Models\SekolahLolos;
use App\Models\Siswa;
use App\Models\SiswaGagal;
use App\Models\SiswaLolos;
use App\Models\WaliSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////Controller Pendaftar//////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //ini buat preview data pendaftar
    public function viewPendaftar(Request $request){
        $id = $request->input('id');

        $getPendaftar = Siswa::with('sekolah', 'walisiswa')->where('id',$id)->first();
        // dd($getPendaftar);

        return view('dashboard.modal_pendaftar.viewPendaftar', compact('getPendaftar'));
    }

    function export_excel()
    {
        return Excel::download(new ExportPendaftar,"pendaftar.xlsx");
    }

    //ini buat form edit data pendaftar
    public function editFormPendaftar(Request $request){
        $id = $request->input('id');

        $getPendaftar = Siswa::with('sekolah', 'walisiswa')->where('id',$id)->first();

        return view('dashboard.modal_pendaftar.editPendaftar', compact('getPendaftar'));
    }

    //ini buat aksi edit/update data pendaftar
    public function editPendaftar(Request $request, $id){

        //ini data siswa
        $nama_lengkap = $request->input('namaLengkap');
        $nama_panggilan = $request->input('namaPanggilan');
        $jenis_kelamin = $request->input('jenisKelamin');
        $tempat_lahir = $request->input('tempatLahir');
        $tanggal_lahir = $request->input('tanggalLahir');
        $alamat_lengkap = $request->input('alamatLengkap');
        $nik = $request->input('nik');
        $anak_ke = $request->input('anakKe');
        $jumlah_saudara_kandung = $request->input('jumlahSaudara');

        //inisialisasi nama file untuk kk dan akta
        $kutip = array(' ', '"', "'", '-', '/', '(', ')', '.', ',', ':', ';', '?', '!', '@', '#', '$', '%', '^', '&', '*', '=', '+', '|', '~', '`', '{', '}', '[', ']', '<', '>', '/', '\\', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $ganti = "_";
        $nama_kecil = strtolower($nama_lengkap);
        $nama_lengkap_baru = str_replace($kutip, $ganti, $nama_kecil);

        $kk_lama = $request->input('kartuKeluargaLama');
        if($request->hasFile('kartuKeluargaBaru')){
            $kk = "kk_".$nama_lengkap_baru."_".time().".".$request->file('kartuKeluargaBaru')->getClientOriginalExtension();
        } else {
            $kk = $kk_lama;
        }

        $akta_lama = $request->input('aktaKelahiranLama');
        if($request->hasFile('aktaKelahiranBaru')){
            $akta = "akta_".$nama_lengkap_baru."_".time().".".$request->file('aktaKelahiranBaru')->getClientOriginalExtension();
        } else {
            $akta = $akta_lama;
        }

        // dd($akta);

        //ini data sekolah
        $asal_sekolah = $request->input('asalSekolah');
        $alamat_sekolah = $request->input('alamatSekolah');
        $nisn = $request->input('nisn');
        $npsn = $request->input('npsn');

        //ini data orang tua
        $nama_ayah = $request->input('namaAyah');
        $pekerjaan_ayah = $request->input('pekerjaanAyah');
        $pendidikan_ayah = $request->input('pendidikanAyah');
        $alamat_ayah = $request->input('alamatAyah');

        $nama_ibu = $request->input('namaIbu');
        $pekerjaan_ibu = $request->input('pekerjaanIbu');
        $pendidikan_ibu = $request->input('pendidikanIbu');
        $alamat_ibu = $request->input('alamatIbu');

        //mulai aksi update data
        try{
            // Simpan data siswa ke database
            $data_siswa = [
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
            $update_data_siswa = Siswa::where('id', $id)->update($data_siswa);

            // dd($update_data_siswa);

            if($update_data_siswa){
                if($request -> hasFile('kartuKeluargaBaru')){
                    //hapus file kartu keluarga lama
                    $folderPathLama = "public/kartu_keluarga/".$kk_lama;
                    Storage::delete($folderPathLama);// hapus file lama

                    //store file kartu keluarga baru
                    $folderPath = "public/kartu_keluarga/";
                    $request -> file('kartuKeluargaBaru') -> storeAs($folderPath, $kk);
                }

                if($request -> hasFile('aktaKelahiranBaru')){
                    //hapus file akta kelahiran lama
                    $folderPathLama = "public/akta_kelahiran/".$akta_lama;
                    Storage::delete($folderPathLama);// hapus file lama

                    //store file akta kelahiran baru
                    $folderPath = "public/akta_kelahiran/";
                    $request -> file('aktaKelahiranBaru') -> storeAs($folderPath, $akta);
                }
            }

            // Simpan data sekolah
            $data_sekolah = [
                'nik_siswa' => $nik,
                'asal_sekolah' => $asal_sekolah,
                'alamat_sekolah' => $alamat_sekolah,
                'nisn' => $nisn,
                'npsn' => $npsn
            ];
            $update_data_sekolah = Sekolah::where('nik_siswa', $nik)->update($data_sekolah);

            // Simpan data orang tua
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
            $update_data_orangtua = WaliSiswa::where('nik_siswa', $nik)->update($data_orangtua);

            if($update_data_siswa && $update_data_sekolah && $update_data_orangtua){
                return Redirect::back()->with('success', 'Data Berhasil Disimpan');
            } else {
                return Redirect::back()->withErrors('error', 'Data Gagal Disimpan');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->withErrors('error', 'Data Gagal Disimpan: ' . $e->getMessage());
        }


    }

    //ini buat delete data pendaftar
    public function deleteSiswa($id){
        try {
            // Cari siswa berdasarkan ID
            $siswa = Siswa::findOrFail($id);

            $cek = $siswa -> nik;

            $sekolah = Sekolah::where('nik_siswa', $cek);
            $orangtua = WaliSiswa::where('nik_siswa', $cek);

            //Hapus data file kk dan akta 
            $kk = $siswa -> kartu_keluarga;
            $akta = $siswa -> akta_kelahiran;

            if($kk != '-'){
                $folderPathKk = "public/kartu_keluarga/".$kk;
                Storage::delete($folderPathKk);
            }
    
            if($akta != '-'){
                $folderPathAkta = "public/akta_kelahiran/".$akta;
                Storage::delete($folderPathAkta);
            }

            // Hapus data siswa
            $siswa->delete();
            $sekolah->delete();
            $orangtua->delete();

            // Redirect ke halaman dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Data siswa berhasil dihapus.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat menghapus data siswa.');
        }
    }
    //ini buat terima siswa
    public function pendaftarLolos(Request $request, $id){
        $data_ambil = Siswa::with('sekolah', 'walisiswa')->where('id', $id)->first();
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
        $nama_ayah = $data_ambil -> walisiswa -> nama_ayah;
        $pekerjaan_ayah = $data_ambil -> walisiswa -> pekerjaan_ayah;
        $pendidikan_ayah = $data_ambil -> walisiswa -> pendidikan_ayah;
        $alamat_ayah = $data_ambil -> walisiswa -> alamat_ayah;

        $nama_ibu = $data_ambil -> walisiswa -> nama_ibu;
        $pekerjaan_ibu = $data_ambil -> walisiswa -> pekerjaan_ibu;
        $pendidikan_ibu = $data_ambil -> walisiswa -> pendidikan_ibu;
        $alamat_ibu = $data_ambil -> walisiswa -> alamat_ibu;

        //data sekolah
        $asal_sekolah = $data_ambil -> sekolah -> asal_sekolah;
        $alamat_sekolah = $data_ambil -> sekolah -> alamat_sekolah;
        $nisn = $data_ambil -> sekolah -> nisn;
        $npsn = $data_ambil -> sekolah -> npsn;

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
    
            $simpan_data_siswa = SiswaLolos::create($data_siswa);
    
            // Simpan data sekolah ke database
            $data_sekolah = [
                'nik_siswa' => $nik,
                'asal_sekolah' => $asal_sekolah,
                'alamat_sekolah' => $alamat_sekolah,
                'nisn' => $nisn,
                'npsn' => $npsn
            ];
            $simpan_data_sekolah = SekolahLolos::create($data_sekolah);
    
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

            $simpan_data_orangtua = OrangTuaLolos::create($data_orangtua);

            $siswa = Siswa::findOrFail($id);

            $cek = $siswa -> nik;

            $sekolah = Sekolah::where('nik_siswa', $cek);
            $orangtua = WaliSiswa::where('nik_siswa', $cek);

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

    //ini buat tolak siswa
    public function pendaftarGagal(Request $request, $id){
        $data_ambil = Siswa::with('sekolah', 'walisiswa')->where('id', $id)->first();
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
        $nama_ayah = $data_ambil -> walisiswa -> nama_ayah;
        $pekerjaan_ayah = $data_ambil -> walisiswa -> pekerjaan_ayah;
        $pendidikan_ayah = $data_ambil -> walisiswa -> pendidikan_ayah;
        $alamat_ayah = $data_ambil -> walisiswa -> alamat_ayah;

        $nama_ibu = $data_ambil -> walisiswa -> nama_ibu;
        $pekerjaan_ibu = $data_ambil -> walisiswa -> pekerjaan_ibu;
        $pendidikan_ibu = $data_ambil -> walisiswa -> pendidikan_ibu;
        $alamat_ibu = $data_ambil -> walisiswa -> alamat_ibu;

        //data sekolah
        $asal_sekolah = $data_ambil -> sekolah -> asal_sekolah;
        $alamat_sekolah = $data_ambil -> sekolah -> alamat_sekolah;
        $nisn = $data_ambil -> sekolah -> nisn;
        $npsn = $data_ambil -> sekolah -> npsn;

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
    
            $simpan_data_siswa = SiswaGagal::create($data_siswa);
    
            // Simpan data sekolah ke database
            $data_sekolah = [
                'nik_siswa' => $nik,
                'asal_sekolah' => $asal_sekolah,
                'alamat_sekolah' => $alamat_sekolah,
                'nisn' => $nisn,
                'npsn' => $npsn
            ];
            $simpan_data_sekolah = SekolahGagal::create($data_sekolah);
    
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

            $simpan_data_orangtua = OrangTuaGagal::create($data_orangtua);

            $siswa = Siswa::findOrFail($id);

            $cek = $siswa -> nik;

            $sekolah = Sekolah::where('nik_siswa', $cek);
            $orangtua = WaliSiswa::where('nik_siswa', $cek);

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
