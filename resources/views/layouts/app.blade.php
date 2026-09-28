<!DOCTYPE html>
<html lang="id" class="{{ request('theme') === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tugas PBKK') — ITS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 font-sans antialiased">

    {{-- Navbar --}}
    <nav class="bg-white dark:bg-gray-900 border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex items-center justify-between h-14">
                {{-- Brand --}}
                <a href="{{ route('home') }}" class="text-sm font-bold tracking-tight uppercase text-its dark:text-blue-400">
                    PBKK — Tugas 4
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-1 text-sm">
                    <a href="{{ route('home', request()->only('theme')) }}"
                       class="px-3 py-1.5 font-medium transition {{ request()->routeIs('home') ? 'text-its dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        Home
                    </a>
                    <a href="{{ route('profile', request()->only('theme')) }}"
                       class="px-3 py-1.5 font-medium transition {{ request()->routeIs('profile') ? 'text-its dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        Profil Mahasiswa
                    </a>
                    <a href="{{ route('agent', request()->only('theme')) }}"
                       class="px-3 py-1.5 font-medium transition {{ request()->routeIs('agent') ? 'text-its dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        Ide Agent
                    </a>
                    <a href="{{ route('ipk.kalkulator', array_merge(['ip1' => '3.50', 'ip2' => '3.45'], request()->only('theme'))) }}"
                       class="px-3 py-1.5 font-medium transition {{ request()->routeIs('ipk.kalkulator') ? 'text-its dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        Kalkulator IP
                    </a>

                    {{-- Theme Toggle --}}
                    @php
                        $isDark = request('theme') === 'dark';
                        $toggleTheme = $isDark ? 'light' : 'dark';
                        $toggleUrl = request()->fullUrlWithQuery(['theme' => $toggleTheme]);
                    @endphp
                    <a href="{{ $toggleUrl }}"
                       class="ml-2 px-3 py-1.5 font-mono text-xs border border-slate-200 dark:border-slate-700 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition"
                       title="Ganti ke {{ $toggleTheme }} mode">
                        {{ $isDark ? '☀ Light' : '● Dark' }}
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
                <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-gray-900">
            <div class="px-6 py-3 space-y-1 text-sm">
                <a href="{{ route('home', request()->only('theme')) }}"
                   class="block px-3 py-2 font-medium {{ request()->routeIs('home') ? 'text-its dark:text-blue-400' : 'text-gray-600 dark:text-gray-400' }}">
                    Home
                </a>
                <a href="{{ route('profile', request()->only('theme')) }}"
                   class="block px-3 py-2 font-medium {{ request()->routeIs('profile') ? 'text-its dark:text-blue-400' : 'text-gray-600 dark:text-gray-400' }}">
                    Profil Mahasiswa
                </a>
                <a href="{{ route('agent', request()->only('theme')) }}"
                   class="block px-3 py-2 font-medium {{ request()->routeIs('agent') ? 'text-its dark:text-blue-400' : 'text-gray-600 dark:text-gray-400' }}">
                    Ide Agent
                </a>
                <a href="{{ route('ipk.kalkulator', array_merge(['ip1' => '3.50', 'ip2' => '3.45'], request()->only('theme'))) }}"
                   class="block px-3 py-2 font-medium {{ request()->routeIs('ipk.kalkulator') ? 'text-its dark:text-blue-400' : 'text-gray-600 dark:text-gray-400' }}">
                    Kalkulator IP
                </a>
                @php
                    $isDark = request('theme') === 'dark';
                    $toggleTheme = $isDark ? 'light' : 'dark';
                    $toggleUrl = request()->fullUrlWithQuery(['theme' => $toggleTheme]);
                @endphp
                <a href="{{ $toggleUrl }}" class="block px-3 py-2 font-mono text-xs text-gray-500 dark:text-gray-400">
                    {{ $isDark ? '☀ Light Mode' : '● Dark Mode' }}
                </a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="max-w-5xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-slate-200 dark:border-slate-800 mt-16">
        <div class="max-w-5xl mx-auto px-6 py-5 flex items-center justify-between text-xs text-gray-400 dark:text-gray-600">
            <span>&copy; {{ date('Y') }} Institut Teknologi Sepuluh Nopember</span>
            <span class="font-mono">PBKK — Laravel Routing & Multi-View</span>
        </div>
    </footer>

</body>
</html>
