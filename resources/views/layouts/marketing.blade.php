<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Nazleh Ounce' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-white overflow-x-hidden" style="font-family: var(--font-body);">
    <div class="page-loader">
        <div class="flex flex-col items-center">
            <div class="mb-8">
                <div class="w-20 h-20 flex items-center justify-center border border-primary/30 relative">
                    <div class="absolute inset-0 border-t border-primary animate-spin" style="animation-duration: 3s;"></div>
                    <span class="text-4xl text-primary" style="font-family: var(--font-display); font-weight: 300;">N</span>
                </div>
            </div>
            <p class="text-sm tracking-[0.3em] uppercase text-white/50" style="font-family: var(--font-body); font-weight: 300;">Loading</p>
        </div>
    </div>

    <div class="cursor-outer hidden md:block"></div>
    <div class="cursor-inner hidden md:block"></div>

    <div class="fixed inset-0 -z-10">
        <div class="parallax-layer absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%238BD4E2\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
    </div>

    <nav id="site-nav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-700">
        <div class="transition-all duration-700 bg-background/40 backdrop-blur-xl">
            <div class="max-w-[1600px] mx-auto px-6 md:px-12 py-4 flex items-center justify-between">
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <span class="text-2xl tracking-[0.2em] uppercase text-white transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">
                        NAZLEH OUNCE
                    </span>
                </a>

                <div class="hidden md:flex items-center gap-10">
                    <a href="{{ url('/') }}" class="relative text-base tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group" style="font-family: var(--font-body); font-weight: 400;">Home
                        <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/about') }}" class="relative text-base tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group" style="font-family: var(--font-body); font-weight: 400;">About
                        <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/collection') }}" class="relative text-base tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group" style="font-family: var(--font-body); font-weight: 400;">Collection
                        <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/verification') }}" class="relative text-base tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group" style="font-family: var(--font-body); font-weight: 400;">Verification
                        <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                    </a>
                    <a href="{{ url('/contact') }}" class="relative text-base tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group" style="font-family: var(--font-body); font-weight: 400;">Contact
                        <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/account') }}" class="flex items-center gap-2 text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group" style="font-family: var(--font-body); font-weight: 400;">
                            <span class="hidden lg:inline">Account</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary text-sm tracking-wider">
                                Sign Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center gap-2 px-4 py-2 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary text-sm tracking-wider">
                            Sign In
                        </a>
                    @endauth
                    <button type="button" data-mobile-toggle class="md:hidden flex items-center justify-center w-10 h-10 border border-primary/30 text-primary hover:border-primary/60 hover:bg-primary/10 transition-all duration-500" aria-label="Open menu">
                        <span class="block w-5 h-px bg-current relative">
                            <span class="absolute -top-2 left-0 w-5 h-px bg-current"></span>
                            <span class="absolute top-2 left-0 w-5 h-px bg-current"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div data-mobile-overlay class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300 z-40 md:hidden"></div>
    <aside data-mobile-menu class="fixed top-0 right-0 h-full w-72 bg-background/95 backdrop-blur-xl border-l border-primary/20 transform translate-x-full transition-transform duration-500 z-50 md:hidden">
        <div class="flex items-center justify-between px-6 py-5 border-b border-primary/20">
            <span class="text-sm tracking-[0.3em] uppercase text-primary">Menu</span>
            <button type="button" data-mobile-toggle class="text-primary text-xl">×</button>
        </div>
        <div class="flex flex-col gap-6 px-6 py-8">
            <a href="{{ url('/') }}" class="text-base tracking-[0.2em] uppercase text-white/70 hover:text-primary transition-colors duration-300">Home</a>
            <a href="{{ url('/about') }}" class="text-base tracking-[0.2em] uppercase text-white/70 hover:text-primary transition-colors duration-300">About</a>
            <a href="{{ url('/collection') }}" class="text-base tracking-[0.2em] uppercase text-white/70 hover:text-primary transition-colors duration-300">Collection</a>
            <a href="{{ url('/verification') }}" class="text-base tracking-[0.2em] uppercase text-white/70 hover:text-primary transition-colors duration-300">Verification</a>
            <a href="{{ url('/contact') }}" class="text-base tracking-[0.2em] uppercase text-white/70 hover:text-primary transition-colors duration-300">Contact</a>
            @auth
                <a href="{{ url('/account') }}" class="text-base tracking-[0.2em] uppercase text-white/70 hover:text-primary transition-colors duration-300">Account</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-base tracking-[0.2em] uppercase text-primary">Sign Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-base tracking-[0.2em] uppercase text-primary">Sign In</a>
            @endauth
        </div>
    </aside>

    <main class="min-h-screen bg-background">
        @yield('content')
    </main>
</body>
</html>
