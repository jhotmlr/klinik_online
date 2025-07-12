@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Pasien</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasiens.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $pasien->email }}" required>
        </div>

        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $pasien->no_hp }}" required>
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="{{ $pasien->alamat }}" required>
        </div>

        <div class="form-group">
            <label>Keluhan:</label>
            <textarea name="keluhan" class="form-control" required>{{ $pasien->keluhan }}</textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
