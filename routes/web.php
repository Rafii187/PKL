<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\GuruController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\Laporan\HarianController;
use App\Http\Controllers\Main\Laporan\RekapController;
use App\Http\Controllers\Main\MapelController;
use App\Http\Controllers\Main\PenilaianController;
use App\Http\Controllers\Main\SekolahController;
use App\Http\Controllers\Main\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/auth/login');
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'processLogin']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'processRegister']);
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('main')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // user
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('user/tambah', [UserController::class, 'tambah'])->name('tambah');
    Route::post('user/simpan', [UserController::class, 'simpan'])->name('user.simpan');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('user/lihat/{id}', [UserController::class, 'lihat'])->name('user.lihat');
    Route::post('user/aksi_ubah/{id}', [UserController::class, 'aksi_ubah'])->name('user.aksi_ubah');
    Route::get('user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');

    // mapel
    Route::resource('mapel', MapelController::class);
    // sekolah
    Route::resource('sekolah', SekolahController::class);
    // guru
    Route::resource('guru', GuruController::class);
    // penilaian
    Route::get('penilaian/diterima', [PenilaianController::class, 'diterima'])->name('penilaian.diterima');
    Route::get('penilaian/ditolak', [PenilaianController::class, 'ditolak'])->name('penilaian.ditolak');
    Route::resource('penilaian', PenilaianController::class);

    // Laporan rekap
    Route::get('laporan/rekap', [RekapController::class, 'index'])->name('rekap');
    Route::get('laporan/rekap/cetak', [RekapController::class, 'cetakRekap'])->name('laporan.rekap.cetak');
});



    // gejala
    // Route::get('gejala', [GejalaController::class, 'index'])->name('gejala');
    // Route::get('gejala/tambah', [GejalaController::class, 'tambah'])->name('tambah');
    // Route::post('gejala/simpan', [GejalaController::class, 'simpan'])->name('gejala.simpan');
    // Route::get('gejala/edit/{id}', [GejalaController::class, 'edit'])->name('gejala.edit');
    // Route::get('gejala/lihat/{id}', [GejalaController::class, 'lihat'])->name('gejala.lihat');
    // Route::post('gejala/aksi_ubah/{id}', [GejalaController::class, 'aksi_ubah'])->name('gejala.aksi_ubah');
    // Route::get('gejala/hapus/{id}', [GejalaController::class, 'hapus'])->name('gejala.hapus');