@extends('layouts.public')

@section('content')
<div class="container py-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold m-0" style="color: #0077b6;">Detail Rekam Medis</h3>
                <a href="{{ route('data-pasien') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>

            <div class="card p-0 overflow-hidden shadow-lg border-0" style="border-radius: 20px;">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ $pasien->gambar ? asset($pasien->gambar) : 'https://via.placeholder.com/400x400.png?text=No+Image' }}" class="img-fluid h-100 object-fit-cover" alt="Foto Pasien">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="card-title fw-bold mb-4" style="color: #00b4d8;">{{ $pasien->nama_pasien }}</h2>
                            
                            <div class="mb-3">
                                <h6 class="text-muted text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Tanggal Kunjungan</h6>
                                <p class="fs-5 fw-medium">{{ \Carbon\Carbon::parse($pasien->tanggal_kunjungan)->format('d F Y') }}</p>
                            </div>

                            <div class="mb-3">
                                <h6 class="text-muted text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Dokter Pemeriksa</h6>
                                <p class="fs-5 fw-medium">{{ $pasien->dokter }}</p>
                            </div>

                            <div class="mb-0">
                                <h6 class="text-muted text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Hasil Diagnosa</h6>
                                <div class="p-3 bg-light rounded-3 mt-2 border-start border-4 border-info">
                                    <p class="m-0 fs-6">{{ $pasien->diagnosa }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
