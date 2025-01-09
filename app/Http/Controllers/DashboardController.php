<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Feedback;
use App\Models\Sekolah;
use App\Models\Siswa;
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

        // dd($getDonatur);

        return view('dashboard.maindashboard', compact('getFeedback', 'getDonatur', 'getPendaftar'));
    }

    public function viewPendaftar(Request $request){
        $id = $request->input('id');

        $getPendaftar = Siswa::find($id);

        return view('dashboard.modal_pendaftar.viewPendaftar', compact('getPendaftar'));
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

    public function deleteSiswa($id){
        try {
            // Cari siswa berdasarkan ID
            $siswa = Siswa::findOrFail($id);

            // Hapus data siswa
            $siswa->delete();

            // Redirect ke halaman dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Data siswa berhasil dihapus.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat menghapus data siswa.');
        }
    }



}
