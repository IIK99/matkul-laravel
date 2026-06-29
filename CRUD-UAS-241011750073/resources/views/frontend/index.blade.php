@extends('layouts.public')

@section('content')
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di Sistem Rekam Medis</h1>
        <p class="lead mb-0">Platform Terpercaya untuk Data Medis Pasien</p>
    </div>
</div>

<div class="container mb-5">
    <h3 class="mb-4 text-center fw-bold" style="color: #0077b6;">Daftar Pasien Terkini</h3>
    <div class="row g-4">
        @forelse($pasiens as $pasien)
            <div class="col-md-4">
                <a href="{{ route('data-pasien.show', $pasien->id_pasien) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="{{ $pasien->gambar ? asset($pasien->gambar) : 'https://via.placeholder.com/400x200.png?text=No+Image' }}" class="card-img-top pasien-img" alt="Foto Pasien">
                        <div class="card-body text-dark">
                            <h5 class="card-title fw-bold" style="color: #00b4d8;">{{ $pasien->nama_pasien }}</h5>
                            <p class="card-text mb-1"><small class="text-muted">Tanggal: {{ \Carbon\Carbon::parse($pasien->tanggal_kunjungan)->format('d M Y') }}</small></p>
                            <p class="card-text mb-1"><strong>Dokter:</strong> {{ $pasien->dokter }}</p>
                            <hr>
                            <p class="card-text"><strong>Diagnosa:</strong><br> {{ Str::limit($pasien->diagnosa, 50) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h5 class="text-muted">Belum ada data pasien.</h5>
            </div>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center mt-5">
        {{ $pasiens->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
