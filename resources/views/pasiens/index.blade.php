@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pasien</h1>

    <form method="GET" action="{{ route('pasiens.index') }}" class="mb-3 d-flex">
        <input type="text" name="keyword" class="form-control me-2" placeholder="Cari nama/email..." value="{{ request('keyword') }}">
        <button type="submit" class="btn btn-secondary">Cari</button>
    </form>

    <a href="{{ route('pasiens.create') }}" class="btn btn-primary mb-3">+ Tambah Pasien</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Keluhan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($pasiens as $pasien)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->email }}</td>
                <td>{{ $pasien->no_hp }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->keluhan }}</td>
                <td>
                    <a href="{{ route('pasiens.show', $pasien->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pasiens.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pasiens.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">Data tidak ditemukan.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
