<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerAuth;
use App\Http\Controllers\ControllerBlog;
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

/* Login Require */

Route::get('/dashboard', [ControllerDashboard::class, 'index'])
->name('dashboard')
->middleware('auth');

Route::get('/blog', [ControllerBlog::class, 'index'])
->name('blog')
->middleware('auth');

Route::get('/akun', function () {
    return view('admin.akun');
})->middleware('auth');

Route::get('/manajemenakun', [ControllerUser::class, 'akun'])
->name('manajemenakun')
->middleware('auth');

/* Logic */

/* Auth */
Route::post('login', [ControllerAuth::class, 'login'])->name('login.post');
Route::post('logout', [ControllerAuth::class, 'logout'])->name('logout');

/* Akun */
Route::post('/daftar', [ControllerUser::class, 'daftar'])
->name('daftar.post');
Route::post('/daftarAdmin', [ControllerUser::class, 'daftarAdmin'])
->name('daftaradmin.post');

/* Blog */
Route::post('/blog', [ControllerBlog::class, 'store'])->name('blog.store');
Route::get('/blogs/{id}/edit', [ControllerBlog::class, 'edit'])->name('blog.edit');
Route::delete('/blogs/{id}', [ControllerBlog::class, 'destroy'])->name('blog.destroy');
