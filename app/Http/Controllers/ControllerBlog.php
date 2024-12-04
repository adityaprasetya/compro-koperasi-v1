<?php

namespace App\Http\Controllers;

use App\Models\ModelBlog;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerBlog extends Controller
{
    // Menampilkan halaman untuk membuat blog
    public function index()
    {
        // Ambil semua data blog dari tabel blogs
    $blogs = ModelBlog::with('author')->get();  // Pastikan untuk eager load author (penulis)

    // Menambahkan pageTitle untuk halaman manajemen blog
    $pageTitle = 'Blog';

    // Kirim data blog ke tampilan
    return view('admin.blog', compact('blogs', 'pageTitle'));

    }

    // Menampilkan detail artikel
    public function show($slug)
    {
        // Mengambil artikel berdasarkan slug
        $blog = ModelBlog::where('slug', $slug)->firstOrFail();
                
        // Mengambil daftar artikel terbaru untuk sidebar
        $blogs = ModelBlog::latest()->take(5)->get();  // Ambil 5 artikel terbaru

        return view('artikel-single', compact('blog', 'blogs'));
    }

    // Fungsi untuk mengambil gambar dari folder storage
    public function getImage($filename)
    {
        // Tentukan direktori tempat gambar disimpan
        $path = storage_path('app/public/' . $filename);

        // Cek apakah file ada
        if (file_exists($path)) {
            // Ambil ekstensi file
            $extension = pathinfo($path, PATHINFO_EXTENSION);

            // Tentukan tipe MIME untuk gambar
            $mimeType = mime_content_type($path);

            // Kembalikan gambar dengan tipe MIME yang sesuai
            return response()->file($path, [
                'Content-Type' => $mimeType
            ]);
        }

        // Jika file tidak ada, kembalikan respons error 404
        return abort(404);
    }

    // Menangani form untuk membuat dan menyimpan blog
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
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

            // Mendapatkan nama file tanpa direktori (gunakan hashName() untuk memastikan nama file unik)
            $imageName = $image->getClientOriginalName(); // Menyimpan nama asli gambar
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Simpan dengan nama file asli di folder 'images'
        } else {
            $imagePath = null; // Jika tidak ada gambar, set null
        }

        // Membuat slug berdasarkan title
        $slug = Str::slug($request->title); 

        // Cek apakah slug sudah ada, jika ada tambahkan angka di belakang slug
        if (ModelBlog::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . Str::random(4); // Tambahkan random string agar slug unik
        }

        // Simpan blog baru ke database
        ModelBlog::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug, // Menyimpan slug
            'author_id' => auth()->user()->id, // Penulis diambil dari pengguna yang sedang login
            'image' => $imageName, // Menyimpan hanya nama file gambar, bukan path
        ]);

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog')->with('success', 'Blog berhasil dibuat');
    }

    // Menampilkan form untuk mengedit blog
    public function edit($id)
    {
        // Ambil data blog berdasarkan ID
        $blog = ModelBlog::findOrFail($id);
        $users = ModelUser::all(); // Ambil semua data pengguna untuk dipilih sebagai author
        return view('blog.edit', compact('blog', 'users'));
    }

    // Menangani update blog
    public function update(Request $request, $id)
    {
        // Validasi inputan dari form
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data blog yang ingin diupdate
        $blog = ModelBlog::findOrFail($id);

        // Menangani gambar jika ada
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($blog->image) {
                Storage::disk('public')->delete('images/' . $blog->image); // Menghapus file gambar lama
            }

            // Ambil file gambar baru
            $image = $request->file('image');
            
            // Mendapatkan nama file tanpa direktori (gunakan hashName() untuk memastikan nama file unik)
            $imageName = $image->getClientOriginalName(); // Menyimpan nama asli gambar
            $imagePath = $image->storeAs('images', $imageName, 'public'); // Simpan dengan nama file asli di folder 'images'
        } else {
            // Jika tidak ada gambar baru, biarkan gambar lama tetap digunakan
            $imageName = $blog->image;
        }

        // Membuat slug berdasarkan title (jika title berubah)
        $slug = Str::slug($request->title);

        // Cek apakah slug sudah ada, jika ada tambahkan angka di belakang slug
        if (ModelBlog::where('slug', $slug)->where('id', '<>', $id)->exists()) {
            $slug = $slug . '-' . Str::random(4); // Tambahkan random string agar slug unik
        }

        // Update data blog
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug, // Menyimpan slug
            'author_id' => auth()->user()->id, // Penulis diambil dari pengguna yang sedang login
            'image' => $imageName, // Menyimpan nama file gambar, bukan path
        ]);

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog')->with('success', 'Blog berhasil diperbarui');
    }

    // Menghapus blog
    public function destroy($id)
    {
        // Ambil data blog berdasarkan ID
        $blog = ModelBlog::findOrFail($id);

        // Hapus blog
        $blog->delete();

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog')->with('success', 'Blog berhasil dihapus');
    }
}