<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Kopi Gak Jago</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-image: url('{{ asset("feane-assets/images/hero-bg.jpeg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
        }

        /* Dark overlay instead of white */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.65);
            z-index: 1;
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 0 15px;
            display: flex;
            justify-content: center;
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            color: #fff;
        }

        .glass-card .card-header {
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 25px 20px;
        }

        .glass-card .card-header h4 {
            font-weight: 700;
            letter-spacing: 1px;
            color: #ffc107;
            text-transform: uppercase;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #ffc107;
            box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-label {
            font-weight: 300;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #1e1e1e;
            border-radius: 10px;
            padding: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn-warning:hover {
            background-color: #ffca2c;
            border-color: #ffc720;
            box-shadow: 0 0 15px rgba(255, 193, 7, 0.6);
            transform: translateY(-2px);
        }

        .demo-text {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 25px;
            padding-top: 15px;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.5);
            color: #ff8a93;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="glass-card">
            <div class="card-header text-center">
                <h4 class="mb-0">Admin Access</h4>
            </div>
            <div class="card-body p-4 p-md-5">
                
                @if ($errors->any())
                <div class="alert alert-danger px-4 py-3">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="admin@example.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 mt-2">Login to Dashboard</button>
                </form>
                
                <div class="text-center demo-text">
                    Demo Login : admin@example.com / password
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>