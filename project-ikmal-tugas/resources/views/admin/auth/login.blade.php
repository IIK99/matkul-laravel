<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Aldi's Burger</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #111827; /* Dark background */
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,0.2) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,0.2) 0, transparent 50%);
            min-height: 100vh;
        }
        .glass-panel {
            background: rgba(31, 41, 55, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

    <!-- Decorative elements -->
    <div class="fixed top-20 -left-20 w-72 h-72 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="fixed top-40 -right-20 w-72 h-72 bg-orange-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="fixed -bottom-32 left-20 w-72 h-72 bg-red-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="w-full max-w-md z-10">
        <!-- Logo/Brand -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-yellow-400 to-orange-500 shadow-lg mb-4">
                <i class="fas fa-hamburger text-2xl text-white"></i>
            </div>
            <h1 class="text-3xl font-bold text-white tracking-tight">Admin<span class="text-yellow-400">Panel</span></h1>
            <p class="text-gray-400 mt-2">Sign in to manage Aldi's Burger</p>
        </div>

        <!-- Login Form -->
        <div class="glass-panel rounded-2xl p-8">
            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg mb-6 flex items-start">
                    <i class="fas fa-exclamation-circle mt-1 mr-3"></i>
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-500"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                class="block w-full pl-10 pr-3 py-3 border border-gray-600 rounded-xl bg-gray-800/50 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
                                placeholder="admin@mail.com">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-500"></i>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-600 rounded-xl bg-gray-800/50 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-semibold text-white bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-400 hover:to-orange-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 focus:ring-offset-gray-900 transition-all transform hover:-translate-y-0.5">
                        Sign In
                        <i class="fas fa-arrow-right ml-2 mt-1 shadow-sm"></i>
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-700/50 text-center">
                <p class="text-sm text-gray-500">
                    Use <span class="text-yellow-400 font-medium">admin@mail.com</span> and <span class="text-yellow-400 font-medium">password123</span>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
