<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rekam Medis</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            color: #333;
        }
        .navbar-custom {
            background-color: #00b4d8; /* Aqua Blue */
        }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .nav-link:hover {
            color: #e0fbfc;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .btn-primary-custom {
            background-color: #0077b6;
            border-color: #0077b6;
            color: #fff;
        }
        .btn-primary-custom:hover {
            background-color: #023e8a;
            border-color: #023e8a;
            color: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">🏥 Klinik Sehat Bersama</a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Data Pasien link removed as requested -->
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <span class="nav-link">Halo, {{ Auth::user()->name }}</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-light mt-1">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @yield('content')
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

@yield('scripts')
</body>
</html>
