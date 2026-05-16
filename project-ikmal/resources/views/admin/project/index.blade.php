@extends('admin.template')
@section('content')
    <div class="container mt-5">
        <h3 class="mb-4">Data Project</h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Add Project</a>
        <div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped" id="projects-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Technologies</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->teknologi }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#projects-table').DataTable();
        });
    </script>
@endsection