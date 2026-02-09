@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-6 py-32">
        <div class="w-full max-w-md reveal" data-reveal>
            <div class="text-center mb-12">
                <h1 class="text-4xl mb-3 tracking-wide text-primary" style="font-family: var(--font-display);">NAZLEH OUNCE</h1>
                <p class="text-foreground/60 text-sm tracking-wider">CREATE YOUR ACCOUNT</p>
            </div>

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 md:p-10">
                <h2 class="text-2xl mb-8 text-center" style="font-family: var(--font-display);">Register</h2>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">FULL NAME</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">N</span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full bg-background/60 border border-primary/30 px-12 py-3 focus:outline-none focus:border-primary/60 transition-colors duration-500 text-foreground placeholder:text-foreground/30" placeholder="Your full name" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">EMAIL ADDRESS</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">@</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="w-full bg-background/60 border border-primary/30 px-12 py-3 focus:outline-none focus:border-primary/60 transition-colors duration-500 text-foreground placeholder:text-foreground/30" placeholder="your@email.com" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">PASSWORD</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">*</span>
                            <input id="register_password" type="password" name="password" required autocomplete="new-password" class="w-full bg-background/60 border border-primary/30 px-12 py-3 focus:outline-none focus:border-primary/60 transition-colors duration-500 text-foreground placeholder:text-foreground/30" placeholder="Minimum 6 characters" />
                            <button type="button" data-toggle-password="register_password" class="absolute right-4 top-1/2 -translate-y-1/2 text-primary/50 hover:text-primary transition-colors duration-300">
                                Show
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">CONFIRM PASSWORD</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">*</span>
                            <input id="register_password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full bg-background/60 border border-primary/30 px-12 py-3 focus:outline-none focus:border-primary/60 transition-colors duration-500 text-foreground placeholder:text-foreground/30" placeholder="Re-enter password" />
                            <button type="button" data-toggle-password="register_password_confirmation" class="absolute right-4 top-1/2 -translate-y-1/2 text-primary/50 hover:text-primary transition-colors duration-300">
                                Show
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-primary/10 border border-primary/40 py-4 hover:bg-primary/20 hover:border-primary/60 transition-all duration-700 text-primary tracking-widest relative overflow-hidden group">
                        <span class="relative z-10">CREATE ACCOUNT</span>
                        <span class="absolute inset-0 bg-primary/5 translate-y-full group-hover:translate-y-0 transition-transform duration-700"></span>
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-foreground/60">Already have an account?
                        <a href="{{ route('login') }}" class="text-primary hover:text-primary/80 transition-colors duration-300 underline">Sign In</a>
                    </p>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}" class="text-xs text-foreground/40 hover:text-foreground/70 transition-colors duration-300 tracking-wider">BACK TO HOME</a>
                </div>
            </div>
        </div>
    </div>
@endsection
