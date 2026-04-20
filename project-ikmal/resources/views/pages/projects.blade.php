@extends('layout.app')
@section('title','Projects')
@section('content')
<div class="container mt-5">

    <div class="row mt-5 text-center">
        @forelse ($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}" alt="{{ $project->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-muted">{{ $project->teknologi }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center" role="alert">
                Belum ada project yang ditampilkan.
            </div>
        </div>
        @endforelse
        <div class="d-flex justify-content-center mt-4">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection