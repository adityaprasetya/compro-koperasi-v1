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
        // Validasi inputan gambar
        $validator = Validator::make($request->all(), [
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Slide 1
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Slide 2
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Slide 3
        ]);

        // Jika validasi gagal
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
            $image1->storeAs('sliders', $image1Name, 'public');
            
            // Cek apakah sudah ada gambar dengan id = 1
            $slider1 = ModelSlider::find(1);
            if ($slider1) {
                // Update gambar pada id = 1
                $slider1->update(['image' => $image1Name]);
            } else {
                // Jika tidak ada, buat record baru
                ModelSlider::create(['image' => $image1Name]);
            }
        }

        // Proses gambar 2 (Slide 2) - jika ada
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2Name = $image2->getClientOriginalName();
            $image2->storeAs('sliders', $image2Name, 'public');
            
            // Cek apakah sudah ada gambar dengan id = 2
            $slider2 = ModelSlider::find(2);
            if ($slider2) {
                // Update gambar pada id = 2
                $slider2->update(['image' => $image2Name]);
            } else {
                // Jika tidak ada, buat record baru
                ModelSlider::create(['image' => $image2Name]);
            }
        }

        // Proses gambar 3 (Slide 3) - jika ada
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3Name = $image3->getClientOriginalName();
            $image3->storeAs('sliders', $image3Name, 'public');
            
            // Cek apakah sudah ada gambar dengan id = 3
            $slider3 = ModelSlider::find(3);
            if ($slider3) {
                // Update gambar pada id = 3
                $slider3->update(['image' => $image3Name]);
            } else {
                // Jika tidak ada, buat record baru
                ModelSlider::create(['image' => $image3Name]);
            }
        }

        // Redirect setelah berhasil
        return redirect()->route('sliders')->with('success', 'Slider berhasil diperbarui');
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