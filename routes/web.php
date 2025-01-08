<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

//untuk Guest
Route::middleware(['guest']) -> group(function () {

    //Halaman Pendaftaran
    Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
    Route::post('daftar/store', [DaftarController::class, 'store'])->name('daftar.store');
    
    //Halaman Kegiatan
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');

    //landing page atau home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/feedback/store', [HomeController::class, 'storeFeedback'])->name('feedback.store');

    //login
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/loginrequest', [AuthController::class, 'loginrequest']);
    
});

//untuk Auth
Route::middleware(['auth:admin'])-> group(function () {

    //dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Delete siswa
    Route::delete('/dashboard/siswa/{id}', [DashboardController::class, 'deleteSiswa'])->name('siswa.delete');


    //dashboard admin donatur
    Route::post('/admin/donatur/store', [DashboardController::class, 'storeDonatur'])->name('admin.storeDonatur');

    //admin kegiatan
    Route::get('/admin/kegiatan', [KegiatanController::class, 'adminIndex'])->name('admin.kegiatan');
    Route::post('/admin/kegiatan/store', [KegiatanController::class, 'storeKegiatan'])->name('admin.storeKegiatan');
    Route::post('/admin/kegiatan/edit', [KegiatanController::class, 'editFormKegiatan'])->name('admin.editFormKegiatan');
    Route::post('/admin/kegiatan/{id}/edit', [KegiatanController::class, 'editKegiatan'])->name('admin.editKegiatan');
    Route::post('/admin/kegiatan/{id}/delete', [KegiatanController::class, 'deleteKegiatan'])->name('admin.deleteKegiatan');

    //logout
    Route::get('/logout', [AuthController::class, 'logoutrequest'])->name('logout');
});

