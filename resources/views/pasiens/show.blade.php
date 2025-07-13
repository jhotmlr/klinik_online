@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pasien</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
            <p><strong>Email:</strong> {{ $pasien->email }}</p>
            <p><strong>No HP:</strong> {{ $pasien->no_hp }}</p>
            <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
            <p><strong>Keluhan:</strong> {{ $pasien->keluhan }}</p>
            <p><strong>Tanggal Daftar:</strong> {{ \Carbon\Carbon::parse($pasien->tanggal_daftar)->format('d M Y') }}</p>
            <p><strong>Tanggal Pemeriksaan:</strong> {{ \Carbon\Carbon::parse($pasien->tanggal_pemeriksaan)->format('d M Y') }}</p>
            <p><strong>Dibuat:</strong> {{ $pasien->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <br>
    <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali ke daftar</a>
</div>
@endsection
