<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $pasiens = Pasien::where('nama', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->latest()
                    ->paginate(10);

        return view('pasiens.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'tanggal_daftar' => 'required|date',
        ]);

        $tanggalDaftar = $request->tanggal_daftar;
        $tanggalPemeriksaan = Carbon::parse($tanggalDaftar)->addDay()->toDateString();

        Pasien::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keluhan' => $request->keluhan,
            'tanggal_daftar' => $tanggalDaftar,
            'tanggal_pemeriksaan' => $tanggalPemeriksaan,
        ]);

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.show', compact('pasien'));
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'keluhan' => 'required',
            'tanggal_daftar' => 'required|date',
        ]);

        $tanggalDaftar = $request->tanggal_daftar;
        $tanggalPemeriksaan = Carbon::parse($tanggalDaftar)->addDay()->toDateString();

        $pasien = Pasien::findOrFail($id);
        $pasien->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keluhan' => $request->keluhan,
            'tanggal_daftar' => $tanggalDaftar,
            'tanggal_pemeriksaan' => $tanggalPemeriksaan,
        ]);

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
