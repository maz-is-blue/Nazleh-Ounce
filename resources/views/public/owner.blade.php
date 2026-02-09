@extends('layouts.marketing')

@section('content')
    <section class="min-h-screen px-6 py-32">
        <div class="max-w-5xl mx-auto">
            <div class="mb-12 text-center reveal" data-reveal>
                <h1 class="text-4xl md:text-5xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">
                    {{ $owner->name }}'s Collection
                </h1>
                <p class="text-white/60">Verified Nazleh Ounce holdings</p>
            </div>

            @if ($bars->isEmpty())
                <div class="text-center py-16 reveal" data-reveal data-delay="200">
                    <p class="text-white/60">No bars assigned yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($bars as $index => $bar)
                        <div class="border border-primary/20 p-6 md:p-8 bg-background/40 backdrop-blur-sm reveal" data-reveal data-delay="{{ $index * 120 }}">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl text-white" style="font-family: var(--font-display); font-weight: 400;">
                                    {{ ucfirst($bar->metal_type) }} Alloy
                                </h2>
                                <span class="text-xs tracking-[0.3em] uppercase text-primary">{{ ucfirst($bar->status) }}</span>
                            </div>
                            <div class="space-y-2 text-white/70 text-sm">
                                <p><span class="text-white/40">Public ID:</span> <span class="font-mono">{{ $bar->public_id }}</span></p>
                                <p><span class="text-white/40">Label Code:</span> <span class="font-mono">{{ $bar->human_code ?? '—' }}</span></p>
                                <p><span class="text-white/40">Weight:</span> {{ $bar->weight }} g</p>
                                <p><span class="text-white/40">Purity:</span> {{ $bar->purity ?? '—' }}</p>
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('bar.show', $bar->public_id) }}" class="text-primary text-sm tracking-[0.2em] uppercase hover:text-primary/80 transition-colors duration-300">View Verification</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
