<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Feedback;
use App\Models\OrangTuaGagal;
use App\Models\OrangTuaLolos;
use App\Models\Sekolah;
use App\Models\SekolahGagal;
use App\Models\SekolahLolos;
use App\Models\Siswa;
use App\Models\SiswaGagal;
use App\Models\SiswaLolos;
use App\Models\WaliSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){

        ///get data feedback dan menampilkan 20 data per halamannya
        $getFeedback = Feedback::paginate(20);
        $getDonatur = Donatur::paginate(20);
        $getPendaftar = Siswa::with(['walisiswa','sekolah'])->paginate(20);
        $getPendaftarLolos = SiswaLolos::with(['orang_tua_lolos','sekolah_lolos'])->paginate(20);
        $getPendaftarGagal = SiswaGagal::with(['orang_tua_gagal','sekolah_gagal'])->paginate(20);

        // dd($getDonatur);

        return view('dashboard.maindashboard', compact('getFeedback',
         'getDonatur', 'getPendaftar', 'getPendaftarLolos', 'getPendaftarGagal'));
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////Controller Donatur////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function storeDonatur(Request $request){
        $nama = $request->input('namaDonatur');
        $jenisKelamin = $request->input('jenisKelaminDonatur');
        $alamat = $request->input('alamatDonatur');
        $tanggalDonasi = $request->input('tanggalDonasi');
        $nominalDonasi = $request->input('nominalDonasi');
        $jenisDonasi = $request->input('jenisDonasi');

        $kutip = array(' ', '"', "'", '-', '/', '(', ')', '.', ',', ':', ';', '?', '!', '@', '#', '$', '%', '^', '&', '*', '=', '+', '|', '~', '`', '{', '}', '[', ']', '<', '>', '/', '\\', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $ganti = "_";
        $nama_kecil = strtolower($nama);
        $nama_lengkap_baru = str_replace($kutip, $ganti, $nama_kecil);

        $foto = "-";
        if($request->hasFile('fotoDonasi')){
            $foto = "Donasi_".$nama_lengkap_baru."_".time().".".$request->file('fotoDonasi')->getClientOriginalExtension();
        }

        try {
            $data = [
                'nama_donatur' => $nama,
                'jenis_kelamin_donatur' => $jenisKelamin,
                'alamat_donatur' => $alamat,
                'tanggal_donasi' => $tanggalDonasi,
                'nominal_donasi' => $nominalDonasi,
                'jenis_donasi' => $jenisDonasi,
                'foto_donasi' => $foto
            ];

            // dd($data);
            // $simpan = DB::table('table_donatur')->insert($data);
            $simpan = Donatur::create($data);
            // dd($simpan);
            if($simpan){
                if($request -> hasFile('fotoDonasi')){
                    $folderPath = "public/donasi/";
                    $request -> file('fotoDonasi') -> storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return Redirect::back()->with(['error' => 'Data Gagal Disimpan']);
            }
            
        } catch (\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning'=> 'Data Gagal Disimpan'.$e->getMessage()]);
        }
    }

    public function viewDonatur(Request $request){
        $id = $request->input('id');

        $getDonatur = Donatur::find($id);

        // dd($getKegiatan);

        return view('dashboard.modal_donatur.viewDonatur', compact('getDonatur'));
    }

    public function editFormDonatur(Request $request){
        $id = $request->input('id');

        $getDonatur = Donatur::find($id);

        return view('dashboard.modal_donatur.editDonatur', compact('getDonatur'));
    }

    public function editDonatur(Request $request, $id){
        $nama = $request->input('namaDonatur');
        $jenisKelamin = $request->input('jenisKelaminDonatur');
        $alamat = $request->input('alamatDonatur');
        $tanggalDonasi = $request->input('tanggalDonasi');
        $nominalDonasi = $request->input('nominalDonasi');
        $jenisDonasi = $request->input('jenisDonasi');
        
        $kutip = array(' ', '"', "'", '-', '/', '(', ')', '.', ',', ':', ';', '?', '!', '@', '#', '$', '%', '^', '&', '*', '=', '+', '|', '~', '`', '{', '}', '[', ']', '<', '>', '/', '\\', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $ganti = "_";
        $nama_kecil = strtolower($nama);
        $nama_lengkap_baru = str_replace($kutip, $ganti, $nama_kecil);

        $foto_lama = $request->input('fotoLama');
        $foto = $foto_lama;
        if($request->hasFile('fotoDonasi')){
            $foto = "Donasi_".$nama_lengkap_baru."_".time().".".$request->file('fotoDonasi')->getClientOriginalExtension();
        }

        try {
            $data = [
                'nama_donatur' => $nama,
                'jenis_kelamin_donatur' => $jenisKelamin,
                'alamat_donatur' => $alamat,
                'tanggal_donasi' => $tanggalDonasi,
                'nominal_donasi' => $nominalDonasi,
                'jenis_donasi' => $jenisDonasi,
                'foto_donasi' => $foto
            ];

            $update = Donatur::where('id', $id)->update($data);

            if($update){
                if($request -> hasFile('fotoDonasi')){
                    //hapus foto profil lama agar tidak duplikat
                    $folderPathLama = "public/donasi/".$foto_lama;
                    Storage::delete($folderPathLama);

                    $folderPath = "public/donasi/";
                    $request -> file('fotoDonasi') -> storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Diubah']);
            } else {
                return Redirect::back()->with(['error' => 'Data Gagal Diubah']);
            }

        } catch (\Exception $e) {
            return Redirect::back()->with(['warning'=> 'Data Gagal Diubah'.$e->getMessage()]);
        }
    }

    public function deleteDonatur($id){
        // hapus data donatur
        $delete = Donatur::where('id', $id)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['error' => 'Data Gagal Dihapus']);
        }
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////Controller Pendaftar//////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //ini buat preview data pendaftar
    public function viewPendaftar(Request $request){
        $id = $request->input('id');

        $getPendaftar = Siswa::with('sekolah', 'walisiswa')->where('id',$id)->first();

        return view('dashboard.modal_pendaftar.viewPendaftar', compact('getPendaftar'));
    }

    //ini buat edit data pendaftar

    //ini buat delete data pendaftar
    public function deleteSiswa($id){
        try {
            // Cari siswa berdasarkan ID
            $siswa = Siswa::findOrFail($id);

            $cek = $siswa -> nik;

            $sekolah = Sekolah::where('nik_siswa', $cek);
            $orangtua = WaliSiswa::where('nik_siswa', $cek);

            // dd($orangtua);

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
