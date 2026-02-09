@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-4xl mx-auto">
            <div class="mb-8">
                <h1 class="font-display text-4xl text-primary mb-2">Bar Details</h1>
                <p class="text-foreground/60">Verification record for this bar.</p>
            </div>

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Public ID</p>
                        <p class="text-white/90 font-mono">{{ $bar->public_id }}</p>
                    </div>
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Label Code</p>
                        <p class="text-white/90 font-mono">{{ $bar->human_code ?? '—' }}</p>
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
                    <div>
                        <p class="text-xs tracking-[0.3em] uppercase text-white/40 mb-2">Status</p>
                        <p class="text-white/90">{{ ucfirst($bar->status) }}</p>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="{{ route('account.bars.index') }}" class="text-primary text-sm tracking-wider">Back to Bars</a>
                </div>
            </div>
        </div>
    </div>
@endsection
