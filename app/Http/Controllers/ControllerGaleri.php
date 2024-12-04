<?php

namespace App\Http\Controllers;

use App\Models\ModelGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerGaleri extends Controller
{
    public function index()
    {
        $galeris = ModelGaleri::all();  // Ambil semua data galeri

        $pageTitle = 'Galeri';

        return view('admin.galeri', compact('galeris', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // Validasi inputan dari form
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Menangani gambar jika ada
        if ($request->hasFile('image')) {
            // Ambil file gambar
            $image = $request->file('image');

            // Mendapatkan nama file gambar (gunakan hashName() agar nama file unik)
            $imageName = $image->hashName(); // Menggunakan hashName untuk memastikan nama file unik

            // Menyimpan gambar ke folder 'galeri' dalam public storage dan mendapatkan path-nya
            $imagePath = $image->storeAs('galeri', $imageName, 'public');  // Simpan di 'public/galeri'
        }

        // Menyimpan informasi gambar ke tabel galeri
        ModelGaleri::create([
            'image' => $imagePath,  // Menyimpan path gambar yang disimpan di storage
        ]);

        // Redirect ke halaman galeri setelah berhasil
        return redirect()->route('galeri')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Cari gambar berdasarkan ID
        $galeri = ModelGaleri::find($id);

        if ($galeri) {
            // Hapus file gambar dari storage
            Storage::disk('public')->delete($galeri->image);

            // Hapus data galeri dari database
            $galeri->delete();

            return redirect()->route('galeri')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('galeri')->with('error', 'Gambar tidak ditemukan.');
    }

}