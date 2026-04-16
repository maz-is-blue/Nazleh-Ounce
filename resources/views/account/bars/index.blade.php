@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-6xl mx-auto">
            <div class="mb-10">
                <h1 class="font-display text-4xl text-primary mb-2">Your Bars</h1>
                <p class="text-foreground/60">Verified alloys assigned to your account.</p>
            </div>
            @include('marketing.partials.live-prices')


            @if ($bars->isEmpty())
                <div class="text-center py-20">
                    <p class="text-foreground/50">You do not own any bars yet.</p>
                </div>
            @else
                <div class="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-primary/5 border-b border-primary/20">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">LABEL</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">PUBLIC ID</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">METAL</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">WEIGHT (g)</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">STATUS</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">SOLD AT</th>
                                <th class="px-6 py-4 text-right text-sm tracking-wider text-foreground/80"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bars as $bar)
                                <tr class="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                                    <td class="px-6 py-4 text-foreground/70">{{ $bar->human_code ?? '—' }}</td>
                                    <td class="px-6 py-4 font-mono text-sm text-primary">{{ $bar->public_id }}</td>
                                    <td class="px-6 py-4 text-foreground/70">{{ ucfirst($bar->metal_type) }}</td>
                                    <td class="px-6 py-4 text-foreground/70">{{ $bar->weight }}</td>
                                    <td class="px-6 py-4 text-foreground/70">{{ ucfirst($bar->status) }}</td>
                                    <td class="px-6 py-4 text-foreground/70">{{ optional($bar->sold_at)->format('Y-m-d') ?? '—' }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('account.bars.show', $bar->public_id) }}" class="text-primary text-sm tracking-wider">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

