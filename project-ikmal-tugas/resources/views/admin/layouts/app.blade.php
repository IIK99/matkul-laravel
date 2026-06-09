<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col transition-all duration-300">
            <div class="p-6 flex items-center justify-center border-b border-gray-800">
                <h1 class="text-2xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">AdminPanel</h1>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 bg-gray-800 text-yellow-400 rounded-lg transition-colors">
                    <i class="fas fa-home w-5"></i>
                    <span class="ml-3 font-medium">Dashboard</span>
                </a>
                <a href="{{ route('menus.index') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-box w-5"></i>
                    <span class="ml-3 font-medium">Menus</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-3 font-medium">Users</span>
                </a>
                <div class="pt-4 mt-4 border-t border-gray-800">
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-globe w-5"></i>
                        <span class="ml-3 font-medium">View Website</span>
                    </a>
                </div>
            </nav>

            <div class="p-4 border-t border-gray-800">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex w-full items-center px-4 py-3 text-gray-400 hover:bg-red-600 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3 font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-8 py-4 flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                    
                    <div class="flex items-center space-x-4">
                        <span class="font-medium text-gray-700">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>
