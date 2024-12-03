<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelTugas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ControllerTugas extends Controller
{
    public function index()
    {
        $tugas = ModelTugas::all(); 

        $pageTitle = 'Tugas';

        return view('tugas', compact('tugas', 'pageTitle'));
    }

    public function posting(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        // Simpan data tugas baru
        ModelTugas::create([
            'guru_id' => auth()->id(), // Pastikan guru yang login
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tugas')->with('success', 'Tugas berhasil ditambahkan.');
    }

}
