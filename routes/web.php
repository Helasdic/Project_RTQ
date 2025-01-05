<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//untuk login
//Session untuk login admin
Route::middleware(['guest:admin']) -> group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/loginrequest', [AuthController::class, 'loginrequest']);
});

Route::middleware(['auth:admin'])-> group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.maindashboard');
    })->name('dashboard');
});


// Route untuk halaman home
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
// Route::get('/login', [AuthController::class, 'index'])->name('login');

//Daftar
Route::post('daftar/store', [DaftarController::class, 'store'])->name('daftar.store');

Route::get('/kegiatan', function () {
    return view('kegiatan');
})->name('kegiatan');
