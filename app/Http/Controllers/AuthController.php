<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function loginrequest(Request $request) {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('/dashboard'); 
        } else {
            return redirect('/login') -> with(['warning' => 'Email atau Password yang anda masukan salah']);
        }
    }

    public function logoutrequest(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect('/');
        }
    }
}
