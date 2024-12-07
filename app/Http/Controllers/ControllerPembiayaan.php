<?php

namespace App\Http\Controllers;

use App\Models\ModelPembiayaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerPembiayaan extends Controller
{
    public function index()
    {
        $pembiayaan = ModelPembiayaan::all();  // Ambil semua data pembiayaan

        $pageTitle = 'Pembiayaan';

        return view('admin.pembiayaan', compact('pembiayaan', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // Validasi inputan gambar
        $validator = Validator::make($request->all(), [
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Array untuk menyimpan nama gambar
        $imagePaths = [];

        if ($request->hasFile('pembiayaan')) {
            $pembiayaan = $request->file('pembiayaan');
            $pembiayaanName = $pembiayaan->getClientOriginalName();
            $pembiayaan->storeAs('pembiayaan', $pembiayaanName, 'public');
            
            // Cek apakah sudah ada gambar dengan id = 1
            $pembiayaan = ModelPembiayaan::find(1);
            if ($pembiayaan) {
                // Update gambar pada id = 1
                $pembiayaan->update(['image' => $image1Name]);
            } else {
                // Jika tidak ada, buat record baru
                ModelPembiayaan::create(['image' => $image1Name]);
            }
        }

        // Redirect setelah berhasil
        return redirect()->route('pembiayaan')->with('success', 'Pembiayaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Cari gambar berdasarkan ID
        $pembiayaan = ModelPembiayaan::find($id);

        if ($pembiayaan) {
            // Hapus file gambar dari storage
            Storage::disk('public')->delete($pembiayaan->image);

            // Hapus data pembiayaan dari database
            $pembiayaan->delete();

            return redirect()->route('pembiayaan')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('pembiayaan')->with('error', 'Gambar tidak ditemukan.');
    }

}