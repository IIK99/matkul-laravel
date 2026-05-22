<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pages</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
</head>
<style>
body {
    background-image: url('{{ asset("bootstrap-5.3.8-dist/images/1778952933_WhatsApp Image 2026-05-09 at 7-remove-bg-io.png") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
    position: relative;
    margin: 0;
    padding: 0;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: -1;
}

.login-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f8f9fa;
}

.card {
    border-radius: 15px;
    overflow: hidden;
    width: 100%;
    max-width: 400px;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}
</style>

<body>
    <div class="login-wrapper">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark text-center py-3">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 oy-2 fw-bold">Login</button>
                </form>
                <div class="text-center mt-4 pt-2 text-muted border-top">
                    <small>Demo Login : admin@example.com / password</small>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>