@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card p-4">
            <h4 class="text-center fw-bold mb-4" style="color: #0077b6;">Login Admin</h4>
            
            @if ($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label text-muted">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" value="{{ old('username') }}" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label text-muted">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary-custom btn-lg rounded-pill">Login</button>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ url('/') }}" class="text-decoration-none" style="color: #00b4d8;">Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
