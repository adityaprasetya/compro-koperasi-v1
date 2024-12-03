<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerAuth;
use App\Http\Controllers\ControllerTugas;
use App\Http\Controllers\ControllerDashboard;

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

/* View */
Route::get('/', function () {
    return view('home');
});

Route::get('/visi-misi', function () {
    return view('profil.visimisi');
});

Route::get('/struktur-organisasi', function () {
    return view('profil.strukturorganisasi');
});

Route::get('/dewan-direksi', function () {
    return view('profil.dewandireksi');
});

Route::get('/pembiayaan-tmi', function () {
    return view('pinjaman.pembiayaantmi');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/artikel-single', function () {
    return view('artikel-single');
});

Route::get('login', [ControllerAuth::class, 'index'])
->name('login');

Route::get('/daftar', [ControllerUser::class, 'index']);

Route::get('/dashboard', [ControllerDashboard::class, 'index'])
->name('dashboard')
->middleware('auth');

Route::get('/absensi', function () {
    return view('absensi');
})->middleware('auth');

Route::get('/absensiMurid', function () {
    return view('absensimurid');
})->middleware('auth');

Route::get('/nilai', function () {
    return view('nilai');
})->middleware('auth');

Route::get('/tugas', [ControllerTugas::class, 'index'])
->name('tugas')
->middleware('auth');

Route::get('/soal', [ControllerTugas::class, 'index'])
->name('tugas')
->middleware('auth');

Route::get('/akun', function () {
    return view('akun');
})->middleware('auth');

Route::get('/manajemenakun', [ControllerUser::class, 'akun'])
->name('manajemenakun')
->middleware('auth');

/* Auth */
Route::post('login', [ControllerAuth::class, 'login'])->name('login.post');

Route::post('logout', [ControllerAuth::class, 'logout'])->name('logout');

/* Akun */
Route::post('/daftar', [ControllerUser::class, 'daftar'])
->name('daftar.post');

Route::post('/daftarAdmin', [ControllerUser::class, 'daftarAdmin'])
->name('daftaradmin.post');

/* Tugas */
Route::post('/tugas', [ControllerTugas::class, 'posting'])->name('tugas.post');