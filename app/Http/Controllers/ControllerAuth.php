<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerAuth extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi inputan dari form login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Cek apakah user dengan email tersebut ada
        $user = ModelUser::where('email', $request->email)->first();

        // Debug: Pastikan password yang dikirim cocok dengan yang disimpan
        if ($user) {
            // Menggunakan Hash::check untuk membandingkan password plain dan hashed password
            if (Hash::check($request->password, $user->password)) {
                // Jika password cocok, login pengguna
                Auth::login($user);
                return redirect()->route('dashboard');
            } else {
                return back()->withErrors([
                    'password' => 'Password yang Anda masukkan salah.',
                ]);
            }
        }

        // Jika user tidak ditemukan
        return back()->withErrors([
            'email' => 'Email yang Anda masukkan tidak terdaftar.',
        ]);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
