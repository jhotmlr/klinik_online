@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="mb-3 animate__animated animate__fadeInDown">Selamat Datang di Klinik Online dr. Jho Ajm</h1>
    <p class="lead animate__animated animate__fadeInUp">
        Kami menyediakan layanan pendaftaran pasien secara online yang cepat, praktis, dan tanpa antre.
    </p>
    <img src="{{ asset('img/klinik.png') }}" class="img-fluid rounded shadow animate__animated animate__zoomIn" alt="Klinik" style="max-width: 600px;">
    <br><br>
    <a href="{{ route('pasiens.index') }}" class="btn btn-success btn-lg animate__animated animate__fadeInUp">Daftar Sekarang</a>
</div>


<div class="bg-light py-5 mt-5">
    <div class="container">
        <h3 class="text-center mb-4">Apa Kata Pasien Kami</h3>
        <div class="row">
            <div class="col-md-4 text-center">
                <blockquote class="blockquote">
                    <p class="mb-2">Pelayanannya sangat cepat dan ramah.</p>
                    <footer class="blockquote-footer">Andi, 32 tahun</footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center">
                <blockquote class="blockquote">
                    <p class="mb-2">Mudah digunakan, sangat membantu saat keadaan darurat.</p>
                    <footer class="blockquote-footer">Siti, 27 tahun</footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center">
                <blockquote class="blockquote">
                    <p class="mb-2">Saya bisa mendaftar tanpa harus datang ke klinik.</p>
                    <footer class="blockquote-footer">Budi, 40 tahun</footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>
@endsection
