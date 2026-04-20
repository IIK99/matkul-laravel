@extends('layout.app')

@section('title', $project->title . ' - Projects')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('projects') }}">Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
                </ol>
            </nav>

            <div class="card shadow-sm">
                @if($project->image)
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}" style="max-height: 400px; object-fit: cover;">
                @endif

                <div class="card-body">
                    <h1 class="card-title mb-4">{{ $project->title }}</h1>

                    <div class="mb-4">
                        <h5>Deskripsi Proyek</h5>
                        <p class="card-text lead">{{ $project->description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5>Teknologi yang Digunakan</h5>
                                <div class="d-flex flex-wrap gap-2">
                                    @php
                                    $techs = explode(', ', $project->teknologi);
                                    @endphp
                                    @foreach($techs as $tech)
                                    <span class="badge bg-primary fs-6 px-3 py-2">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="mb-4">
                                <h5>Status Proyek</h5>
                                @if($project->status == 'active')
                                <span class="badge bg-success fs-6 px-3 py-2">Active / Sedang Berjalan</span>
                                @elseif($project->status == 'completed')
                                <span class="badge bg-info fs-6 px-3 py-2">Completed / Selesai</span>
                                @else
                                <span class="badge bg-secondary fs-6 px-3 py-2">Archived / Diarsipkan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('projects') }}" class="btn btn-danger w-100">
                            Kembali ke Daftar Proyek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .gap-2 {
        gap: 0.5rem;
    }

    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .badge {
        font-weight: normal;
    }
</style>
@endsection