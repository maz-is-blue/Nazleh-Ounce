@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-6 py-32">
        <div class="w-full max-w-md reveal" data-reveal>
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-3">
                    <svg class="size-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"></path>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>
                    <h1 class="font-display text-4xl tracking-wide text-primary">NAZLEH OUNCE</h1>
                </div>
                <p class="text-foreground/60 text-sm tracking-wider">ADMIN CONTROL PANEL</p>
            </div>

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 md:p-10">
                <h2 class="font-display text-2xl mb-8 text-center text-foreground">Administrator Access</h2>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="redirect_to" value="{{ route('admin.dashboard') }}">
                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">ADMIN EMAIL</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">@</span>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                class="w-full bg-background/60 border border-primary/30 px-12 py-3
                                       focus:outline-none focus:border-primary/60 transition-colors duration-500
                                       text-foreground placeholder:text-foreground/30"
                                placeholder="admin@nazlehounce.com"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">PASSWORD</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">*</span>
                            <input
                                id="admin_password"
                                type="password"
                                name="password"
                                required
                                class="w-full bg-background/60 border border-primary/30 px-12 py-3
                                       focus:outline-none focus:border-primary/60 transition-colors duration-500
                                       text-foreground placeholder:text-foreground/30"
                                placeholder="Enter admin password"
                            />
                            <button type="button" data-toggle-password="admin_password" class="absolute right-4 top-1/2 -translate-y-1/2 text-primary/50 hover:text-primary transition-colors duration-300">Show</button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-primary/10 border border-primary/40 py-4
                                   hover:bg-primary/20 hover:border-primary/60
                                   transition-all duration-700 text-primary tracking-widest
                                   relative overflow-hidden group text-base font-semibold">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"></path>
                                <path d="M9 12l2 2 4-4"></path>
                            </svg>
                            ADMIN ACCESS
                        </span>
                        <span class="absolute inset-0 bg-primary/5 translate-y-full group-hover:translate-y-0 transition-transform duration-700"></span>
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <a href="{{ url('/') }}" class="text-xs text-foreground/40 hover:text-foreground/70
                             transition-colors duration-300 tracking-wider">
                        BACK TO HOME
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
