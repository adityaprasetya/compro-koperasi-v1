<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ControllerUser extends Controller
{
    // Menampilkan halaman register
    public function index()
    {
        return view('daftar');
    }

    public function akun()
    {
        // Ambil semua data pengguna dari tabel as_users
        $users = ModelUser::all();

        // Menambahkan pageTitle untuk halaman manajemen akun
        $pageTitle = 'Manajemen Akun';

        // Kirim data pengguna ke tampilan
        return view('admin.manajemenakun', compact('users', 'pageTitle'));
    }

    // Menangani form register dan menyimpan data pengguna
    public function daftar(Request $request)
    {
        // Validasi inputan dari form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:as_users',
            'password' => 'required|string|min:8|confirmed', // password_confirmation harus ada di form
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan pengguna baru ke database
        $user = ModelUser::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => $request->role, // Sesuaikan role jika perlu
            'phone' => $request->phone, // Jika ada field phone di form
        ]);

        // Setelah berhasil, login otomatis atau redirect sesuai kebutuhan
        // auth()->login($user);

        // Redirect ke halaman yang diinginkan setelah register, bisa ke dashboard atau halaman lain
        return redirect()->route('login'); // Pastikan Anda sudah membuat route 'dashboard'
    }

    public function daftarAdmin(Request $request)
    {
        // Validasi inputan dari form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:as_users',
            'password' => 'required|string|min:8|confirmed', // password_confirmation harus ada di form
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan pengguna baru ke database
        $user = ModelUser::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => $request->role, // Sesuaikan role jika perlu
            'phone' => $request->phone, // Jika ada field phone di form
        ]);

        // Setelah berhasil, login otomatis atau redirect sesuai kebutuhan
        // auth()->login($user);

        // Redirect ke halaman yang diinginkan setelah register, bisa ke dashboard atau halaman lain
        return redirect()->route('manajemenakun'); // Pastikan Anda sudah membuat route 'dashboard'
    }
}
