@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0" style="color: #0077b6;">Edit Data Pasien</h4>
                <a href="{{ route('pasien.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pasien.update', $pasien->id_pasien) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_pasien" class="form-label fw-semibold">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}" required>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dokter" class="form-label fw-semibold">Nama Dokter</label>
                        <input type="text" class="form-control" id="dokter" name="dokter" value="{{ old('dokter', $pasien->dokter) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_kunjungan" class="form-label fw-semibold">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan', $pasien->tanggal_kunjungan) }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="diagnosa" class="form-label fw-semibold">Diagnosa</label>
                    <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" required>{{ old('diagnosa', $pasien->diagnosa) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold">Foto Pasien</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    <div class="form-text">Opsional. Pilih file gambar (.jpg, .jpeg, .png). Maks 5MB. Biarkan kosong jika tidak ingin mengubah.</div>
                    @if($pasien->gambar)
                        <div class="mt-2">
                            <img src="{{ asset($pasien->gambar) }}" alt="Foto Pasien" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                    @endif
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-warning text-white px-4">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
