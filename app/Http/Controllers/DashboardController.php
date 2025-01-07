<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        
        $siswa = Siswa::paginate(10);
        ///get data feedback dan menampilkan 20 data per halamannya
        $getFeedback = Feedback::paginate(20);

        return view('dashboard.maindashboard', compact('siswa','getFeedback'));
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
