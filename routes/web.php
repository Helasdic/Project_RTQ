<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SiswaGagalController;
use App\Http\Controllers\SiswaLolosController;
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

    // Delete Pendaftar
    Route::delete('/dashboard/siswa/{id}', [PendaftarController::class, 'deleteSiswa'])->name('siswa.delete');

    //dashboard admin pendaftar
    Route::post('/admin/pendaftar/export/excel',[PendaftarController::class,'export_excel'])->name('admin.export_excel');
    Route::post('/admin/pendaftar/view', [PendaftarController::class, 'viewPendaftar'])->name('admin.viewPendaftar');
    Route::post('/admin/pendaftar/edit', [PendaftarController::class, 'editFormPendaftar'])->name('admin.editFormPendaftar');
    Route::post('/admin/pendaftar/{id}/edit', [PendaftarController::class, 'editPendaftar'])->name('admin.editPendaftar');
    Route::post('/admin/pendaftar/{id}/lolos', [PendaftarController::class, 'pendaftarLolos'])->name('admin.PendaftarLolos');
    Route::post('/admin/pendaftar/{id}/gagal', [PendaftarController::class, 'pendaftarGagal'])->name('admin.pendaftarGagal');

    //dashboard admin siswa lolos
    Route::post('/admin/lolos/export/excel',[SiswaLolosController::class,'export_excel'])->name('admin.santri.export_excel');
    Route::post('/admin/lolos/view', [SiswaLolosController::class, 'viewLolos'])->name('admin.viewLolos');
    Route::post('/admin/lolos/edit', [SiswaLolosController::class, 'editFormLolos'])->name('admin.editFormLolos');
    Route::post('/admin/lolos/{id}/edit', [PendaftarController::class, 'editLolos'])->name('admin.editLolos');
    Route::post('/admin/lolos/{id}/batal', [SiswaLolosController::class, 'batalLolos'])->name('admin.batalLolos');
    Route::post('/admin/lolos/{id}/delete', [SiswaLolosController::class, 'deleteLolos'])->name('admin.deleteLolos');
    
    //dashboard admin siswa Gagal
    Route::post('/admin/gagal/view', [SiswaGagalController::class, 'viewGagal'])->name('admin.viewGagal');
    Route::post('/admin/gagal/edit', [SiswaGagalController::class, 'editFormGagal'])->name('admin.editFormGagal');
    Route::post('/admin/gagal/{id}/edit', [SiswaGagalController::class, 'editGagal'])->name('admin.editGagal');
    Route::post('/admin/gagal/{id}/batal', [SiswaGagalController::class, 'batalGagal'])->name('admin.batalGagal');
    Route::post('/admin/gagal/{id}/delete', [SiswaGagalController::class, 'deleteGagal'])->name('admin.deleteGagal');

    //dashboard admin donatur
    Route::post('/admin/donatur/export/excel',[DashboardController::class,'export_excel'])->name('admin.donatur.export_excel');
    Route::post('/admin/donatur/store', [DashboardController::class, 'storeDonatur'])->name('admin.storeDonatur');
    Route::post('/admin/donatur/view', [DashboardController::class, 'viewDonatur'])->name('admin.viewDonatur');
    Route::post('/admin/donatur/edit', [DashboardController::class, 'editFormDonatur'])->name('admin.editFormDonatur');
    Route::post('/admin/donatur/{id}/edit', [DashboardController::class, 'editDonatur'])->name('admin.editDonatur');
    Route::post('/admin/donatur/{id}/delete', [DashboardController::class, 'deleteDonatur'])->name('admin.deleteDonatur');

    //admin kegiatan
    Route::get('/admin/kegiatan', [KegiatanController::class, 'adminIndex'])->name('admin.kegiatan');
    Route::post('/admin/kegiatan/store', [KegiatanController::class, 'storeKegiatan'])->name('admin.storeKegiatan');
    Route::post('/admin/kegiatan/edit', [KegiatanController::class, 'editFormKegiatan'])->name('admin.editFormKegiatan');
    Route::post('/admin/kegiatan/{id}/edit', [KegiatanController::class, 'editKegiatan'])->name('admin.editKegiatan');
    Route::post('/admin/kegiatan/{id}/delete', [KegiatanController::class, 'deleteKegiatan'])->name('admin.deleteKegiatan');

    //logout
    Route::get('/logout', [AuthController::class, 'logoutrequest'])->name('logout');
});

