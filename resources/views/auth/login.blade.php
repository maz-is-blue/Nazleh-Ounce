@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-6 py-32">
        <div class="w-full max-w-md reveal" data-reveal>
            <div class="text-center mb-12">
                <h1 class="text-4xl mb-3 tracking-wide text-primary" style="font-family: var(--font-display);">NAZLEH OUNCE</h1>
                <p class="text-foreground/60 text-sm tracking-wider">ACCOUNT ACCESS</p>
            </div>

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 md:p-10">
                <h2 class="text-2xl mb-8 text-center" style="font-family: var(--font-display);">Sign In</h2>

                @if (session('status'))
                    <div class="mb-6 p-4 bg-primary/10 border border-primary/30 text-primary text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">EMAIL ADDRESS</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">@</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full bg-background/60 border border-primary/30 px-12 py-3 focus:outline-none focus:border-primary/60 transition-colors duration-500 text-foreground placeholder:text-foreground/30" placeholder="your@email.com" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">PASSWORD</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">*</span>
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full bg-background/60 border border-primary/30 px-12 py-3 focus:outline-none focus:border-primary/60 transition-colors duration-500 text-foreground placeholder:text-foreground/30" placeholder="Enter your password" />
                            <button type="button" data-toggle-password="password" class="absolute right-4 top-1/2 -translate-y-1/2 text-primary/50 hover:text-primary transition-colors duration-300">
                                Show
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center text-sm text-foreground/60">
                            <input id="remember_me" type="checkbox" class="rounded border-primary/30 bg-background/60 text-primary shadow-sm focus:ring-primary" name="remember">
                            <span class="ms-2">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-foreground/60 hover:text-primary transition-colors duration-300" href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-primary/10 border border-primary/40 py-4 hover:bg-primary/20 hover:border-primary/60 transition-all duration-700 text-primary tracking-widest relative overflow-hidden group">
                        <span class="relative z-10">SIGN IN</span>
                        <span class="absolute inset-0 bg-primary/5 translate-y-full group-hover:translate-y-0 transition-transform duration-700"></span>
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-foreground/60">Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary hover:text-primary/80 transition-colors duration-300 underline">Create Account</a>
                    </p>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}" class="text-xs text-foreground/40 hover:text-foreground/70 transition-colors duration-300 tracking-wider">BACK TO HOME</a>
                </div>
            </div>
        </div>
    </div>
@endsection
