<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis Pasien</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fbfa;
            color: #333;
        }
        .hero-section {
            background: linear-gradient(135deg, #00b4d8, #0077b6);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.3);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .pasien-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-outline-aqua {
            color: #00b4d8;
            border-color: #00b4d8;
        }
        .btn-outline-aqua:hover {
            background-color: #00b4d8;
            color: white;
        }
        .hover-aqua:hover {
            color: #00b4d8 !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" style="color: #0077b6;" href="{{ url('/') }}">
            <span class="fs-4">🏥</span> Klinik Sehat Bersama
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar" aria-controls="publicNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="publicNavbar">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 text-dark hover-aqua" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 text-dark hover-aqua" href="{{ route('data-pasien') }}">Data Rekam Medis Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 text-dark hover-aqua" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 text-dark hover-aqua" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    @auth
                        <a href="{{ route('pasien.index') }}" class="btn btn-outline-aqua px-4 rounded-pill">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-aqua px-4 rounded-pill">Login</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-white py-4 mt-5 text-center text-muted">
    <div class="container">
        <small>&copy; {{ date('Y') }} Klinik Sehat Bersama. Hak Cipta Dilindungi.</small>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
