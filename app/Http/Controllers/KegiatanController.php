<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $getKegiatan = Kegiatan::all();
        return view('kegiatan', compact('getKegiatan'));
    }

    public function adminIndex(){
        $getKegiatan = Kegiatan::all();

        return view('dashboard.adminKegiatan', compact('getKegiatan'));
    }

    public function storeKegiatan(Request $request){
        $nama_kegiatan = $request->input('namaKegiatan');
        $link_kegiatan = $request->input('linkKegiatan');
        $tanggal_mulai = $request->input('tanggalMulai');
        $tanggal_selesai = $request->input('tanggalSelesai');

        // dd($request->file('fotoKegiatan'));

        if($request->hasFile('fotoKegiatan')){
            // $foto_kegiatan = $request -> file('fotoKegiatan') -> getClientOriginalName();
            $foto_kegiatan = "Kegiatan_".time().".".$request->file('fotoKegiatan')->getClientOriginalExtension();
        } else {
            $foto_kegiatan = '-';
        }

        try {
            //code...
            $data = [
                'nama_kegiatan' => $nama_kegiatan,
                'link' => $link_kegiatan,
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'foto_kegiatan' => $foto_kegiatan,
            ];

            $simpan = DB::table('kegiatan')->insert($data);

            if($simpan){
                if($request -> hasFile('fotoKegiatan')){
                    $folderPath = "public/kegiatan/";
                    $request -> file('fotoKegiatan') -> storeAs($folderPath, $foto_kegiatan);
                }
            }
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } catch (\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning'=> 'Data Gagal Disimpan'.$e->getMessage()]);
        }
    }

    public function deleteKegiatan($id){
        $delete = DB::table('kegiatan')->where('id', $id)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }

    public function editFormKegiatan(Request $request){
        $id = $request->input('id');

        $getKegiatan = Kegiatan::find($id);

        // dd($getKegiatan);

        return view('dashboard.editKegiatan', compact('getKegiatan'));
    }

    public function editKegiatan(Request $request, $id){

        $nama_kegiatan = $request->input('namaKegiatan');
        $link_kegiatan = $request->input('linkKegiatan');
        $tanggal_mulai = $request->input('tanggalMulai');
        $tanggal_selesai = $request->input('tanggalSelesai');
        $foto_lama = $request->input('fotoKegiatanLama');

        if($request->hasFile('fotoKegiatan')){
            $foto_kegiatan = "Kegiatan_".time().".".$request->file('fotoKegiatan')->getClientOriginalExtension();
        } else {
            $foto_kegiatan = $foto_lama;
        }

        try{
            $data = [
                'nama_kegiatan' => $nama_kegiatan,
                'link' => $link_kegiatan,
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'foto_kegiatan' => $foto_kegiatan
            ];

            $update = DB::table('kegiatan')->where('id', $id)->update($data);
            if($update){
                if($request -> hasFile('fotoKegiatan')){

                    //hapus foto profil lama agar tidak duplikat
                    $folderPathLama = "public/kegiatan/".$foto_lama;
                    Storage::delete($folderPathLama);
                    
                    $folderPath = "public/kegiatan/";
                    $request -> file('fotoKegiatan') -> storeAs($folderPath, $foto_kegiatan);
                }
            }
            return Redirect::back()->with(['success' => 'Data Berhasil Diubah']);

        } catch (\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning' => 'Data Gagal Diubah']);
        }
    }


}
