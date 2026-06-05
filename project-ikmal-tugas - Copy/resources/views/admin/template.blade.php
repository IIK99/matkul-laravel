<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Kopi Gak Jago | Admin Dashboard')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-bg: #f4f6f9;
            --sidebar-bg: #121418;
            --sidebar-hover: #1f2228;
            --accent-color: #ffc107;
            --accent-hover: #ffca2c;
            --text-dark: #2c3e50;
            --text-light: #f8f9fa;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--primary-bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }
        
        /* Navbar */
        .navbar {
            background-color: var(--sidebar-bg) !important;
            border-bottom: 2px solid var(--accent-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff !important;
        }
        .navbar-brand span {
            color: var(--accent-color);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 260px;
            height: calc(100vh - 70px);
            background-color: var(--sidebar-bg);
            padding-top: 30px;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            z-index: 100;
        }

        .sidebar-header {
            color: rgba(255,255,255,0.5);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 0 25px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .sidebar a {
            color: #a0a5b1;
            padding: 14px 25px;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .sidebar a i {
            margin-right: 15px;
            font-size: 1.1rem;
            width: 25px;
            text-align: center;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: var(--sidebar-hover);
            color: #fff;
            border-left: 4px solid var(--accent-color);
        }
        
        .sidebar a.active i {
            color: var(--accent-color);
        }

        /* Main Content */
        .content {
            margin-left: 260px;
            margin-top: 70px;
            padding: 40px;
            min-height: calc(100vh - 140px);
            transition: all 0.3s ease;
        }

        /* Footer */
        footer {
            margin-left: 260px;
            background-color: #fff;
            border-top: 1px solid #e9ecef;
        }

        /* Cards and Elements */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.03);
            background: #fff;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: #fff;
            border-bottom: 1px solid #f1f1f1;
            padding: 20px 25px;
            border-radius: 15px 15px 0 0 !important;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn {
            font-weight: 500;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all 0.3s;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--sidebar-bg);
            border-color: var(--sidebar-bg);
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }

        .btn-warning {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: #000;
        }

        .btn-warning:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
        }

        .page-title {
            font-weight: 700;
            color: var(--sidebar-bg);
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
        }
        
        .page-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 40px;
            height: 4px;
            background-color: var(--accent-color);
            border-radius: 2px;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top px-4">
        <a href="{{ route('dashboard') }}" class="navbar-brand">Kopi <span>Gak Jago</span></a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-globe me-1"></i> View Site
                    </a>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; font-weight: bold;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-white">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius: 12px;">
                        <li class="dropdown-item-text text-muted px-4 py-2 border-bottom mb-1">
                            <small class="d-block text-uppercase fw-bold" style="font-size: 10px;">Logged in as</small>
                            <strong>{{ Auth::user()->email }}</strong>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger fw-500">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">Main Menu</div>
        <a href="{{ route('menus.index') }}" class="{{ Request::is('admin/menus*') ? 'active' : '' }}">
            <i class="fas fa-coffee"></i> Data Menus
        </a>
        
        <div class="sidebar-header mt-4">Settings</div>
        <a href="#">
            <i class="fas fa-info-circle"></i> Data About
        </a>
        <a href="#">
            <i class="fas fa-envelope"></i> Data Contact
        </a>
    </div>

    <!-- Main Content -->
    <main class="content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-muted">
        <div class="container-fluid">
            <small>&copy; 2026 Kopi Gak Jago. All rights reserved. Crafted with ♥</small>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>
    @yield('scripts')
</body>
</html>