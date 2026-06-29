@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 mt-3">
    <h3 class="fw-bold" style="color: #0077b6;">Data Rekam Medis Pasien</h3>
    <div>
        <a href="{{ route('pasien.export-pdf') }}" class="btn btn-secondary me-2">Export PDF</a>
        <a href="{{ route('pasien.create') }}" class="btn btn-primary-custom">+ Tambah Pasien</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="pasienTable">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Foto</th>
                        <th width="20%">Nama Pasien</th>
                        <th width="15%">Dokter</th>
                        <th width="15%">Tanggal</th>
                        <th width="20%">Diagnosa</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $index => $pasien)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($pasien->gambar)
                                <img src="{{ asset($pasien->gambar) }}" alt="Foto" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $pasien->nama_pasien }}</td>
                        <td>{{ $pasien->dokter }}</td>
                        <td>{{ \Carbon\Carbon::parse($pasien->tanggal_kunjungan)->format('d/m/Y') }}</td>
                        <td>{{ Str::limit($pasien->diagnosa, 30) }}</td>
                        <td>
                            <a href="{{ route('pasien.export-pdf-single', $pasien->id_pasien) }}" class="btn btn-sm btn-info text-white">PDF</a>
                            <a href="{{ route('pasien.edit', $pasien->id_pasien) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                            <form action="{{ route('pasien.destroy', $pasien->id_pasien) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Belum ada data pasien.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#pasienTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>
@endsection
