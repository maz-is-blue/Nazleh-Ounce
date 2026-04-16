@extends('layouts.marketing')

@section('content')
    <section class="min-h-screen px-6 py-32">
        <div class="max-w-4xl mx-auto">
            <div class="mb-12 text-center reveal" data-reveal>
                <h1 class="text-4xl md:text-5xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">
                    Verification Details
                </h1>
                <p class="text-white/60">Public registry for Nazleh Ounce bars</p>
            </div>

            <div class="border border-primary/20 p-8 md:p-10 bg-background/40 backdrop-blur-sm reveal" data-reveal data-delay="200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Serial Number</p>
                        <p class="text-white/90 font-mono">{{ $bar->display_serial ?? 'Pending' }}</p>
                    </div>
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Metal</p>
                        <p class="text-white/90">{{ ucfirst($bar->metal_type) }}</p>
                    </div>
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Weight</p>
                        <p class="text-white/90">{{ $bar->weight }} g</p>
                    </div>
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Purity</p>
                        <p class="text-white/90">{{ $bar->purity ?? '—' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Assigned Owner</p>
                        @if ($bar->owner)
                            <a href="{{ route('owner.show', $bar->owner->id) }}" class="text-primary hover:text-primary/80 transition-colors duration-300">
                                {{ $bar->owner->name }}
                            </a>
                        @else
                            <p class="text-white/60">Not assigned yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
