@extends('admin.template')
@section('content')
    <div class="container mt-5">
        <h3 class="mb-4">Data Project</h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Add Project</a>
        <div class="card">
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
                                <td>{{ $project->technologies }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
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