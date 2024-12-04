<?php

namespace App\Http\Controllers;

use App\Models\ModelSliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerSliders extends Controller
{
    public function index()
    {
        $sliders = ModelSliders::all();  // Ambil semua data sliders

        $pageTitle = 'Sliders';

        return view('admin.sliders', compact('sliders', 'pageTitle'));
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
            $imageName = $image->getClientOriginalName(); // Menyimpan nama asli gambar

            // Menyimpan gambar di dalam folder 'sliders' dalam public storage
            $image->storeAs('sliders', $imageName, 'public');  // Simpan gambar dengan nama asli di 'public/sliders'
        }

        // Menyimpan informasi gambar ke tabel sliders (hanya nama file)
        ModelSliders::create([
            'image' => $imageName,  // Simpan hanya nama file gambar, bukan path
        ]);

        // Redirect ke halaman sliders setelah berhasil
        return redirect()->route('sliders')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function destroy($id)
    {
        // Cari gambar berdasarkan ID
        $sliders = ModelSliders::find($id);

        if ($sliders) {
            // Hapus file gambar dari storage
            Storage::disk('public')->delete($sliders->image);

            // Hapus data sliders dari database
            $sliders->delete();

            return redirect()->route('sliders')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('sliders')->with('error', 'Gambar tidak ditemukan.');
    }

}