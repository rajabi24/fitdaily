<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitDaily — @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        primaryDark: '#1d4ed8',
                        primaryLight: '#eff6ff',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }
    .fade-in-delay-1 {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease 0.2s forwards;
    }
    .fade-in-delay-2 {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease 0.4s forwards;
    }
    .fade-in-delay-3 {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease 0.6s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>
<body class="text-slate-800 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2 text-xl font-bold text-blue-600">
                <i data-lucide="activity" class="w-6 h-6"></i>
                FitDaily
            </a>
            <div class="flex gap-1">
                <a href="/" class="flex items-center gap-1.5 px-4 py-2 rounded-lg font-medium text-sm transition-all duration-200
                {{ request()->is('/') ? 'bg-blue-600 text-white' : 'text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                 <i data-lucide="home" class="w-4 h-4"></i> Home
                </a>
                <a href="/workouts" class="flex items-center gap-1.5 px-4 py-2 rounded-lg font-medium text-sm transition-all duration-200
                {{ request()->is('workouts') ? 'bg-blue-600 text-white' : 'text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                 <i data-lucide="dumbbell" class="w-4 h-4"></i> Latihan
                </a>
                <a href="/meals" class="flex items-center gap-1.5 px-4 py-2 rounded-lg font-medium text-sm transition-all duration-200
                {{ request()->is('meals') ? 'bg-blue-600 text-white' : 'text-slate-600 hover:bg-blue-600 hover:text-white' }}">
                 <i data-lucide="utensils" class="w-4 h-4"></i> Makanan
                </a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="max-w-6xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center text-slate-400 py-6 border-t border-slate-200 mt-10 bg-white">
        <p class="text-sm">© 2026 FitDaily <span class="text-blue-600 font-semibold">Muhammad Riskan Rajabi</span></p>
    </footer>

    <script>lucide.createIcons();</script>
</body>
</html>