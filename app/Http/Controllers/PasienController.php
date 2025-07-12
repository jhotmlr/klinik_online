<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $pasiens = Pasien::when($keyword, function ($query, $keyword) {
            return $query->where('nama', 'like', "%$keyword%")
                         ->orWhere('email', 'like', "%$keyword%");
        })->get();

        return view('pasiens.index', compact('pasiens', 'keyword'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|unique:pasiens,email,' . ($pasien->id ?? ''),
            'no_hp'   => 'required|string|max:20',
            'alamat'  => 'required|string',
            'keluhan' => 'required|string',
        ], [
            'nama.required'    => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'email.unique'     => 'Email sudah terdaftar.',
            'no_hp.required'   => 'Nomor HP wajib diisi.',
            'alamat.required'  => 'Alamat wajib diisi.',
            'keluhan.required' => 'Keluhan wajib diisi.',
        ]);
        

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function show(Pasien $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|unique:pasiens,email,' . ($pasien->id ?? ''),
            'no_hp'   => 'required|string|max:20',
            'alamat'  => 'required|string',
            'keluhan' => 'required|string',
        ], [
            'nama.required'    => 'Nama wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'email.unique'     => 'Email sudah terdaftar.',
            'no_hp.required'   => 'Nomor HP wajib diisi.',
            'alamat.required'  => 'Alamat wajib diisi.',
            'keluhan.required' => 'Keluhan wajib diisi.',
        ]);
        
        $pasien->update($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
