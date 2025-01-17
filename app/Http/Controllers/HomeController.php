<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $getDonatur = Donatur::all();

        return view('home', compact('getDonatur') );
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

            // $simpan = DB::table('feedback')->insert($data);
            $simpan = Feedback::create($data);

            if($simpan){
                return Redirect::back()->with(['success'=> 'Data Berhasil Disimpan']);
            }else{
                return Redirect::back()->with(['error'=> 'Data Gagal Disimpan']);
            }
        } catch(\Exception $e) {
            // dd($e);
            return Redirect::back()->with(['warning'=> 'Data Gagal Disimpan'.$e->getMessage()]);
        }
    }
}
