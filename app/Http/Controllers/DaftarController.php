<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\Siswa;
=======
use illuminate\Support\Facades\DB;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar');
    }

    public function store(Request $request){
        $nama_lengkap = $request->input('namaLengkap');
        $nama_panggilan = $request->input('namaPanggilan');
        $jenis_kelamin = $request->input('jenisKelamin');
        $tempat_lahir = $request->input('tempatLahir');
        $tanggal_lahir = $request->input('tanggalLahir');
        $alamat_lengkap = $request->input('alamatLengkap');
        $nik = $request->input('nik');
        $anak_ke = $request->input('anakKe');
        $jumlah_saudara_kandung = $request->input('jumlahSaudara');
        // dd($request->all());
        
        $asal_sekolah = $request->input('asalSekolah');
        $alamat_sekolah = $request->input('alamatSekolah');
        $nisn = $request->input('nisn');
        $npsn = $request->input('npsn');

        $nama_ayah = $request->input('namaAyah');
        $pekerjaan_ayah = $request->input('pekerjaanAyah');
        $pendidikan_ayah = $request->input('pendidikanAyah');
        $alamat_ayah = $request->input('alamatAyah');

        $nama_ibu = $request->input('namaIbu');
        $pekerjaan_ibu = $request->input('pekerjaanIbu');
        $pendidikan_ibu = $request->input('pendidikanIbu');
        $alamat_ibu = $request->input('alamatIbu');

        $kutip = array(' ', '"', "'", '-', '/', '(', ')', '.', ',', ':', ';', '?', '!', '@', '#', '$', '%', '^', '&', '*', '=', '+', '|', '~', '`', '{', '}', '[', ']', '<', '>', '/', '\\', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $ganti = "_";
        $nama_kecil = strtolower($nama_lengkap);
        $nama_lengkap_baru = str_replace($kutip, $ganti, $nama_kecil);

        // dd($request->file('kartuKeluarga'));
        $kk = '-';
        if($request->hasFile('kartuKeluarga')){
            $kk = "kk_".$nama_lengkap_baru.time().".".$request->file('kartuKeluarga')->getClientOriginalExtension();
        }

        $akta = '-';
        if($request->hasFile('aktaKelahiran')){
            $akta = "akta_".$nama_lengkap_baru.time().".".$request->file('aktaKelahiran')->getClientOriginalExtension();
        }
        
        try {
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
            // $siswa = Siswa::create($data_siswa);
            $simpan_data_siswa = DB::table('siswa')->insert($data_siswa);
            // dd($simpan_data_siswa);

            if($simpan_data_siswa){
                if($request -> hasFile('kartuKeluarga')){
                    $folderPath = "public/kartu_keluarga/";
                    $request -> file('kartuKeluarga') -> storeAs($folderPath, $kk);
                }

                if($request -> hasFile('aktaKelahiran')){
                    $folderPath = "public/akta_kelahiran/";
                    $request -> file('aktaKelahiran') -> storeAs($folderPath, $akta);
                }
            }

            // Simpan data sekolah ke database
            $data_sekolah = [
                'nik_siswa' => $nik,
                'asal_sekolah' => $asal_sekolah,
                'alamat_sekolah' => $alamat_sekolah,
                'nisn' => $nisn,
                'npsn' => $npsn
            ];
            $simpan_data_sekolah = DB::table('sekolah')->insert($data_sekolah);

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
            $simpan_data_orangtua = DB::table('wali_siswa')->insert($data_orangtua);

            return Redirect::back()->with('success', 'Data Berhasil Disimpan');

        } catch (\Exception $e) {
            // Log error untuk debugging
            // Log::error('Gagal menyimpan aplikasi: ' . $e->getMessage());
            dd($e->getMessage());

            return Redirect::back()->withErrors('error', 'Data Gagal Disimpan: ' . $e->getMessage());
        }
    }
}