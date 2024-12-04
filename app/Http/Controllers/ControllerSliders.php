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
        // Validasi inputan gambar, gambar bersifat opsional
        $validator = Validator::make($request->all(), [
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Slide 1
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Slide 2
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Slide 3
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Array untuk menyimpan nama gambar
        $imagePaths = [];

        // Proses gambar 1 (Slide 1) - jika ada
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1Name = $image1->getClientOriginalName();
            $image1->storeAs('sliders', $image1Name, 'public');  // Menyimpan gambar di folder 'public/sliders'
            $imagePaths[] = $image1Name;  // Tambahkan nama gambar ke array
        }

        // Proses gambar 2 (Slide 2) - jika ada
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2Name = $image2->getClientOriginalName();
            $image2->storeAs('sliders', $image2Name, 'public');  // Menyimpan gambar di folder 'public/sliders'
            $imagePaths[] = $image2Name;  // Tambahkan nama gambar ke array
        }

        // Proses gambar 3 (Slide 3) - jika ada
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3Name = $image3->getClientOriginalName();
            $image3->storeAs('sliders', $image3Name, 'public');  // Menyimpan gambar di folder 'public/sliders'
            $imagePaths[] = $image3Name;  // Tambahkan nama gambar ke array
        }

        // Menyimpan setiap gambar sebagai record terpisah di database
        foreach ($imagePaths as $image) {
            ModelSlider::create([
                'image' => $image,  // Simpan setiap nama gambar sebagai record terpisah
            ]);
        }

        // Redirect setelah berhasil
        return redirect()->route('sliders')->with('success', 'Slider berhasil ditambahkan');
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