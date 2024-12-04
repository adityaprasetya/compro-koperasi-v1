<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Models\ModelBlog;
use App\Models\ModelGaleri;
use App\Models\ModelSliders;

use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerAuth;
use App\Http\Controllers\ControllerBlog;
use App\Http\Controllers\ControllerGaleri;
use App\Http\Controllers\ControllerSliders;
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
    // Ambil 3 blog terbaru
    $blogs = ModelBlog::latest()->take(3)->get(); 
    
    // Ambil 9 gambar terbaru dari galeri
    $galeris = ModelGaleri::latest()->take(9)->get(); // Ambil 9 gambar galeri terbaru

    // Ambil gambar sliders
    $sliders = ModelSliders::latest()->take(3)->get(); // Ambil 3 gambar slider terbaru
    
    // Kirim data blogs, galeris, dan sliders ke view 'home'
    return view('home', compact('blogs', 'galeris', 'sliders'));
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
    // Ambil semua blog dan urutkan berdasarkan tanggal terbaru
    $blogs = ModelBlog::latest()->take(10)->get(); // Ambil 6 artikel terbaru
    return view('artikel', compact('blogs'));
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

Route::get('/galeri', [ControllerGaleri::class, 'index'])
->name('galeri')
->middleware('auth');

Route::get('/sliders', [ControllerSliders::class, 'index'])
->name('sliders')
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
Route::put('/blog/{id}', [ControllerBlog::class, 'update'])->name('blog.update');
Route::get('/artikel/{slug}', [ControllerBlog::class, 'show'])->name('blog.show'); // Menampilkan detail artikel

/* Galeri */
Route::post('/galeri', [ControllerGaleri::class, 'store'])->name('galeri.store');
Route::delete('/galeri/{id}', [ControllerGaleri::class, 'destroy'])->name('galeri.destroy');

/* Sliders */
Route::post('/sliders', [ControllerSliders::class, 'store'])->name('sliders.store');

/* Gambar */
Route::get('storage/images/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
});

Route::get('storage/galeri/{filename}', function ($filename) {
    $path = storage_path('app/public/galeri/' . $filename);

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
});

Route::get('storage/sliders/{filename}', function ($filename) {
    $path = storage_path('app/public/sliders/' . $filename);

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
});