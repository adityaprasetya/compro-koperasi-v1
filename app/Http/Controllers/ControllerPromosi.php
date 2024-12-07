<?php

namespace App\Http\Controllers;

use App\Models\ModelPromosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerPromosi extends Controller
{
    public function index()
    {
        $promosi = ModelPromosi::all();  // Ambil semua data promosi

        $pageTitle = 'Promosi';

        return view('admin.promosi', compact('promosi', 'pageTitle'));
    }

    // public function store(Request $request)
    // {
    //     // Validasi inputan gambar
    //     $validator = Validator::make($request->all(), [
    //         'promosi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     // Jika validasi gagal
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     // Array untuk menyimpan nama gambar
    //     $imagePaths = [];

    //     if ($request->hasFile('promosi')) {
    //         $promosi = $request->file('promosi');
    //         $promosiName = $promosi->getClientOriginalName();
    //         $promosi->storeAs('promosi', $promosiName, 'public');
            
    //         // Cek apakah sudah ada gambar dengan id = 1
    //         $promosi = ModelPromosi::find(1);
    //         if ($promosi) {
    //             // Update gambar pada id = 1
    //             $promosi->update(['image' => $promosiName]);
    //         } else {
    //             // Jika tidak ada, buat record baru
    //             ModelPromosi::create(['image' => $promosiName]);
    //         }
    //     }

    //     // Redirect setelah berhasil
    //     return redirect()->route('promosi')->with('success', 'Promosi berhasil diperbarui');
    // }

    public function store(Request $request)
    {
        // Validasi inputan gambar
        $validator = Validator::make($request->all(), [
            'promosi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Array untuk menyimpan nama gambar
        $imagePaths = [];

        if ($request->hasFile('promosi')) {
            $promosi = $request->file('promosi');
            $promosiName = $promosi->getClientOriginalName();
            $promosi->storeAs('promosi', $promosiName, 'public');

            // Buat record baru tanpa memeriksa ID tertentu
            ModelPromosi::create(['image' => $promosiName]);
        }

        // Redirect setelah berhasil
        return redirect()->route('promosi')->with('success', 'Promosi berhasil disimpan');
    }

    public function destroy($id)
    {
        // Cari gambar berdasarkan ID
        $promosi = ModelPromosi::find($id);

        if ($promosi) {
            // Hapus file gambar dari storage
            Storage::disk('public')->delete($promosi->image);

            // Hapus data promosi dari database
            $promosi->delete();

            return redirect()->route('promosi')->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()->route('promosi')->with('error', 'Gambar tidak ditemukan.');
    }

}