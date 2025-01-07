<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function storeFeedback(Request $request){
        $nama = $request->input('name');
        $email = $request->input('email');
        $pesan = $request->input('feedback');

        try{
            $data = [
                'nama' => $nama,
                'email' => $email,
                'pesan' => $pesan,
            ];

            $simpan = DB::table('feedback')->insert($data);

            return Redirect::back()->with(['success'=> 'Data Berhasil Disimpan']);
        } catch(\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning'=> 'Data Gagal Disimpan'.$e->getMessage()]);
        }
    }
}
