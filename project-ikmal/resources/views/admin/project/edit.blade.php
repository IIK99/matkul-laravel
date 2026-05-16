@extends('admin.template')
@section('content')
<div class="container mt-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Edit Project</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="teknologi" class="form-label">Teknologi</label>
                    <input type="text" class="form-control" id="teknologi" name="teknologi" value="{{ $project->teknologi }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="progress" {{ $project->status == 'progress' ? 'selected' : '' }}>In Progress</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($project->image)
                        <small class="text-muted d-block mt-2">Current Image: {{ $project->image }}</small>
                    @endif
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $project->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection