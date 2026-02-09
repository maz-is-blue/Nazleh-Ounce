@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-6xl mx-auto">
            <div class="mb-16 reveal" data-reveal>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h1 class="text-4xl md:text-5xl mb-3 text-primary" style="font-family: var(--font-display);">Your Collection</h1>
                        <p class="text-foreground/60 tracking-wider">Welcome back, {{ auth()->user()->name }}</p>
                        <p class="text-sm text-foreground/40 mt-1">{{ auth()->user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="self-start md:self-auto px-6 py-3 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary tracking-wider flex items-center gap-2 group">
                            <span class="group-hover:translate-x-1 transition-transform duration-500">SIGN OUT</span>
                        </button>
                    </form>
                </div>
            </div>

            @if ($bars->isEmpty())
                <div class="text-center py-20 reveal" data-reveal data-delay="200">
                    <div class="text-primary/30 text-5xl mb-6">*</div>
                    <h2 class="text-2xl mb-3 text-foreground/60" style="font-family: var(--font-display);">No Purchases Yet</h2>
                    <p class="text-foreground/40 mb-8">Your verified alloy collection will appear here</p>
                    <a href="{{ url('/collection') }}" class="px-8 py-4 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-700 text-primary tracking-widest inline-block">
                        EXPLORE COLLECTION
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach ($bars as $index => $bar)
                        <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 hover:border-primary/40 transition-all duration-700 reveal" data-reveal data-delay="{{ $index * 120 }}">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h3 class="text-2xl mb-2 text-primary" style="font-family: var(--font-display);">{{ ucfirst($bar->metal_type) }} Alloy</h3>
                                    <p class="text-sm text-foreground/60">{{ ucfirst($bar->status) }}</p>
                                </div>
                                <span class="text-xs tracking-[0.3em] uppercase text-primary">{{ $bar->human_code ?? 'NA' }}</span>
                            </div>
                            <div class="space-y-2 text-sm text-foreground/70">
                                <p><span class="text-foreground/40">Public ID:</span> <span class="font-mono">{{ $bar->public_id }}</span></p>
                                <p><span class="text-foreground/40">Weight:</span> {{ $bar->weight }} g</p>
                                <p><span class="text-foreground/40">Purity:</span> {{ $bar->purity ?? '—' }}</p>
                                <p><span class="text-foreground/40">Sold At:</span> {{ $bar->sold_at?->format('F j, Y') ?? '—' }}</p>
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('bar.show', $bar->public_id) }}" class="text-primary text-sm tracking-[0.2em] uppercase hover:text-primary/80 transition-colors duration-300">View Verification</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-16 text-center reveal" data-reveal data-delay="400">
                <a href="{{ url('/collection') }}" class="px-8 py-4 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-700 text-primary tracking-widest relative overflow-hidden group inline-block">
                    <span class="relative z-10">EXPLORE MORE ALLOYS</span>
                    <span class="absolute inset-0 bg-primary/5 translate-x-full group-hover:translate-x-0 transition-transform duration-700"></span>
                </a>
            </div>
        </div>
    </div>
@endsection
