<?php

namespace App\Http\Controllers;

use App\Models\ModelSimulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerSimulasi extends Controller
{
    public function index()
    {
        $simulasi = ModelSimulasi::all();  // Ambil semua data simulasi

        $pageTitle = 'Simulasi';

        return view('admin.simulasi', compact('simulasi', 'pageTitle'));
    }

    public function store(Request $request)
    {
        // Validasi inputan gambar
        $validator = Validator::make($request->all(), [
            'simulasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Array untuk menyimpan nama gambar
        $imagePaths = [];

        if ($request->hasFile('simulasi')) {
            $simulasi = $request->file('simulasi');
            $simulasiName = $simulasi->getClientOriginalName();
            $simulasi->storeAs('simulasi', $simulasiName, 'public');
            
            // Cek apakah sudah ada gambar dengan id = 1
            $simulasi = ModelSimulasi::find(1);
            if ($simulasi) {
                // Update gambar pada id = 1
                $simulasi->update(['image' => $simulasiName]);
            } else {
                // Jika tidak ada, buat record baru
                ModelSimulasi::create(['image' => $simulasiName]);
            }
        }

        // Redirect setelah berhasil
        return redirect()->route('simulasi')->with('success', 'Simulasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Cari gambar berdasarkan ID
        $simulasi = ModelSimulasi::find($id);

        if ($simulasi) {
            // Hapus file gambar dari storage
            Storage::disk('public')->delete($simulasi->image);

            // Hapus data simulasi dari database
            $simulasi->delete();

            return redirect()->route('simulasi')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('simulasi')->with('error', 'Gambar tidak ditemukan.');
    }

}