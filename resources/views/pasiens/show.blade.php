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
            <p><strong>Dibuat:</strong> {{ $pasien->created_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <br>
    <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali ke daftar</a>
</div>
@endsection
