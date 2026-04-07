<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Web Profile')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
</head>
<body>
    <navbar class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">My Web Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"></button>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project') }}" class="nav-link">Project</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </navbar>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p>&copy; 2026 My Web Profile. All rights reserved.</p>
        </div>
    </footer>
    <script src='{{ asset("bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js") }}'></script>
</body>
</html>