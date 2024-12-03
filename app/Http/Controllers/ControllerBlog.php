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
        $blog = Blog::where('slug', $slug)->firstOrFail(); // Ambil artikel berdasarkan slug
        return view('blog.show', compact('blog'));
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
        $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan gambar di folder 'public/images'
    } else {
        $imagePath = null; // Jika tidak ada gambar, set null
    }

    // Simpan blog baru ke database
    ModelBlog::create([
        'title' => $request->title,
        'content' => $request->content,
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
        $blog = Blog::findOrFail($id);
        $users = User::all(); // Ambil semua data pengguna untuk dipilih sebagai author
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
        $blog = Blog::findOrFail($id);

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
        $blog = Blog::findOrFail($id);

        // Hapus blog
        $blog->delete();

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog.list')->with('success', 'Blog berhasil dihapus');
    }
}