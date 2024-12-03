<?php

namespace App\Http\Controllers;

use App\Models\ModelBlog;
use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        // Tentukan path file di storage
        $path = storage_path('app/public/' . $filename);

        // Cek apakah file ada di dalam storage
        if (!file_exists($path)) {
            abort(404); // Jika file tidak ada, kembalikan 404
        }

        // Mendapatkan mime type file
        $mimeType = mime_content_type($path);

        // Mengembalikan file sebagai response
        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
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
            // Menyimpan gambar di folder 'public/images' dan mendapatkan path gambar
            $imagePath = $request->file('image')->store('images', 'public'); 
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
            'image' => $imagePath, // Menyimpan path gambar
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
            'author_id' => 'required|exists:users,id', // Pastikan author_id ada di tabel users
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data blog berdasarkan ID
        $blog = ModelBlog::findOrFail($id);

        // Update blog
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $request->author_id,
        ]);

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog.list')->with('success', 'Blog berhasil diperbarui');
    }

    // Menghapus blog
    public function destroy($id)
    {
        // Ambil data blog berdasarkan ID
        $blog = ModelBlog::findOrFail($id);

        // Hapus blog
        $blog->delete();

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog.list')->with('success', 'Blog berhasil dihapus');
    }
}