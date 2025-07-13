@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pasien</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form id="formPasien" action="{{ route('pasiens.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control" required>
        </div>
        <!-- Tanggal pemeriksaan otomatis satu hari setelah tanggal daftar -->

        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
