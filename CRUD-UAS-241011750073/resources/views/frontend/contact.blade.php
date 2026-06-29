@extends('layouts.public')

@section('content')
<div class="container py-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: #0077b6;">Hubungi Kami</h2>
            <p class="fs-5 text-muted">Tim kami siap membantu menjawab pertanyaan Anda atau menjadwalkan konsultasi medis.</p>
        </div>
    </div>
    
    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm p-4">
                <h4 class="fw-bold mb-4" style="color: #00b4d8;">Informasi Kontak</h4>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light p-3 rounded-circle me-3">
                        <span class="fs-4">📍</span>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-bold">Alamat</h6>
                        <p class="mb-0 text-muted">Jl. Kesehatan No. 123, Jakarta Selatan</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light p-3 rounded-circle me-3">
                        <span class="fs-4">📞</span>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-bold">Telepon</h6>
                        <p class="mb-0 text-muted">+62 21 1234 5678</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light p-3 rounded-circle me-3">
                        <span class="fs-4">✉️</span>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-bold">Email</h6>
                        <p class="mb-0 text-muted">info@kliniksehatbersama.com</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center">
                    <div class="bg-light p-3 rounded-circle me-3">
                        <span class="fs-4">🕒</span>
                    </div>
                    <div>
                        <h6 class="mb-1 fw-bold">Jam Operasional</h6>
                        <p class="mb-0 text-muted">Senin - Minggu: 08:00 - 20:00 WIB</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="card h-100 border-0 shadow-sm p-4">
                <h4 class="fw-bold mb-4" style="color: #00b4d8;">Tinggalkan Pesan</h4>
                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Pesan berhasil terkirim! (Demo)');">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-aqua w-100">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
