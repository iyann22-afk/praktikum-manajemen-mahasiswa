<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Semua user (admin & user) bisa melihat daftar
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nama')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // Hanya admin
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Hanya admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim'           => 'required|string|unique:mahasiswas',
            'nama'          => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email'         => 'required|email|unique:mahasiswas',
            'angkatan'      => 'required|integer|min:2000|max:2099',
        ]);

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Hanya admin
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Hanya admin
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim'           => 'required|string|unique:mahasiswas,nim,'.$mahasiswa->id,
            'nama'          => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email'         => 'required|email|unique:mahasiswas,email,'.$mahasiswa->id,
            'angkatan'      => 'required|integer|min:2000|max:2099',
        ]);

        $mahasiswa->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    // Hanya admin
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}