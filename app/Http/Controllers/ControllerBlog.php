<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ControllerBlog extends Controller
{
    // Menampilkan halaman untuk membuat blog
    public function index()
    {
        return view('admin.blog');
    }

    // Menampilkan daftar blog
    public function list()
    {
        // Ambil semua data blog dari tabel blogs
        $blogs = Blog::all();

        // Menambahkan pageTitle untuk halaman manajemen blog
        $pageTitle = 'Manajemen Blog';

        // Kirim data blog ke tampilan
        return view('blog.index', compact('blogs', 'pageTitle'));
    }

    // Menangani form untuk membuat dan menyimpan blog
    public function store(Request $request)
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

        // Simpan blog baru ke database
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => $request->author_id,
        ]);

        // Redirect ke halaman daftar blog setelah berhasil
        return redirect()->route('blog.list')->with('success', 'Blog berhasil dibuat');
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