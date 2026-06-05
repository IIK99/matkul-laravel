@extends('admin.template')
@section('title', 'Manage Menus | Kopi Gak Jago')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title m-0">Coffee Menus</h2>
        <div>
            <a href="{{ route('menus.cetak_pdf') }}" class="btn btn-outline-danger me-2" target="_blank">
                <i class="fas fa-file-pdf me-1"></i> Export PDF
            </a>
            <a href="{{ route('menus.create') }}" class="btn btn-warning">
                <i class="fas fa-plus-circle me-1"></i> Add New Menu
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #d4edda; color: #155724; border-radius: 10px;">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-list me-2"></i> All Menu Items</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="menus-table" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="12%">Image</th>
                            <th width="20%">Title</th>
                            <th width="15%">Category</th>
                            <th width="23%">Description</th>
                            <th width="10%">Price</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                                <td>
                                    <div style="width: 70px; height: 70px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                        <img src="{{ asset('feane-assets/images/' . $menu->image) }}" alt="{{ $menu->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </td>
                                <td class="fw-bold">{{ $menu->title }}</td>
                                <td><span class="badge bg-secondary rounded-pill px-3 py-2">{{ $menu->category }}</span></td>
                                <td class="text-muted small">
                                    {{ Str::limit($menu->description, 50) }}
                                </td>
                                <td class="fw-bold text-success">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-outline-primary rounded-circle" title="Edit" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('menus.cetak_pdf_By_Id', $menu->id) }}" class="btn btn-sm btn-outline-success rounded-circle" target="_blank" title="Download PDF" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this menu?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#menus-table').DataTable({
                "pageLength": 10,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search menu..."
                },
                "dom": "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                       "<'row'<'col-sm-12'tr>>" +
                       "<'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });
            
            // Style DataTables search input
            $('.dataTables_filter input').addClass('form-control form-control-sm').css({'border-radius': '20px', 'padding': '6px 15px'});
        });
    </script>
@endsection