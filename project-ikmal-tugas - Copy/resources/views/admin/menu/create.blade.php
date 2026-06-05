@extends('admin.template')
@section('title', 'Add Menu | Kopi Gak Jago')

@section('content')
<div class="container-fluid max-w-800" style="max-width: 800px; margin: 0 auto;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title m-0">Add New Menu</h2>
        <a href="{{ route('menus.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm" style="background-color: #f8d7da; border-radius: 10px;">
            <div class="d-flex align-items-center mb-2">
                <i class="fas fa-exclamation-triangle me-2 text-danger"></i> 
                <strong>Please fix the following errors:</strong>
            </div>
            <ul class="mb-0 text-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0" style="border-radius: 15px;">
        <div class="card-header bg-white" style="border-radius: 15px 15px 0 0; padding: 20px 25px;">
            <span class="text-muted"><i class="fas fa-coffee me-2"></i> Menu Details</span>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label fw-bold">Menu Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg bg-light" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Kopi Susu Gula Aren" required style="border-radius: 10px; border: 1px solid #e0e0e0;">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg bg-light" id="category" name="category" required style="border-radius: 10px; border: 1px solid #e0e0e0;">
                            <option value="" disabled selected>Select Category...</option>
                            <option value="Coffee" {{ old('category') == 'Coffee' ? 'selected' : '' }}>Coffee</option>
                            <option value="Non-Coffee" {{ old('category') == 'Non-Coffee' ? 'selected' : '' }}>Non-Coffee</option>
                            <option value="Snack" {{ old('category') == 'Snack' ? 'selected' : '' }}>Snack</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold">Price (Rp) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light fw-bold">Rp</span>
                            <input type="number" class="form-control form-control-lg bg-light" id="price" name="price" value="{{ old('price') }}" placeholder="25000" required style="border-radius: 0 10px 10px 0; border: 1px solid #e0e0e0; border-left: none;">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label fw-bold">Product Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-lg bg-light" id="image" name="image" required style="border-radius: 10px; border: 1px solid #e0e0e0;">
                        <small class="text-muted mt-1 d-block">Max size: 2MB. Format: JPG, PNG, WEBP.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="composition" class="form-label fw-bold">Composition (Optional)</label>
                    <textarea class="form-control bg-light" id="composition" name="composition" rows="2" placeholder="e.g. Espresso, Fresh Milk, Palm Sugar" style="border-radius: 10px; border: 1px solid #e0e0e0;">{{ old('composition') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-bold">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control bg-light" id="description" name="description" rows="4" placeholder="Write a catchy description for this menu..." required style="border-radius: 10px; border: 1px solid #e0e0e0;">{{ old('description') }}</textarea>
                </div>

                <hr class="mb-4 text-muted">

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-light border px-4 py-2" style="border-radius: 10px;">Reset</button>
                    <button type="submit" class="btn btn-warning px-5 py-2 fw-bold" style="border-radius: 10px; color: #121418;">
                        <i class="fas fa-save me-2"></i> Save Menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection