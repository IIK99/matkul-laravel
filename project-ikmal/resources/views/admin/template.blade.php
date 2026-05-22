<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Web Profile')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">
</head>
<style>
    body {
        background-color: #f8f9fa;
    }
    
    .sidebar {
        position: fixed;
        top: 70px;
        width: 200px;
        min-height: calc(100vh - 70px);
        background-color: #343a40;
        padding-top: 20px;
    }

    .sidebar a {
        color: #fff;
        padding: 10px 15px;
        display: block;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .content {
        margin-left: 250px;
        margin-top: 70px;
        padding: 20px;
    }
</style>

<body>
    <navbar class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top shadow-sm px-3">
        <div class="container">
            <a href="{{ route('dashboard') }}" class="navbar-brand">My Web Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li class="dropdown-item-text text-muted">
                            <small>{{ Auth::user()->email }}</small>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                </ul>
            </div>
        </div>
    </navbar>
    <div class="sidebar shadow-sm">
        <h5 class="text-center text-white">Admin Menu</h5>
        <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action">Data Projects</a>
        <a href="#" class="list-group-item list-group-item-action">Data About</a>
        <a href="#" class="list-group-item list-group-item-action">Data Contact</a>
    </div>
    <main class="content p-3 d-flex flex-column align-items-center">
        @yield('content')
    </main>
    <footer class="bg-white text-dark border-top text-center py-3 mt-5">
        <div class="container">
            <p>&copy; 2026 My Web Profile. All rights reserved.</p>
        </div>
    </footer>
    <script src='{{ asset("bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js") }}'></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    @yield('scripts')
</body>
</html>