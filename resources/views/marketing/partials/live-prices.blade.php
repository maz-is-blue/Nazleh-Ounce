<div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 mb-12">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl text-primary" style="font-family: var(--font-display);">Live Metal Prices</h2>
        <p class="text-xs text-foreground/50">Source: GoldPriceZ</p>
    </div>

    @if (empty($metalPrices))
        <p class="text-foreground/50">Pricing data is not available yet.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach (['USD', 'AED'] as $currency)
                @php
                    $gold = $metalPrices[$currency]['gold'] ?? null;
                    $silver = $metalPrices[$currency]['silver'] ?? null;
                @endphp
                <div class="border border-primary/10 p-6">
                    <h3 class="text-lg text-primary mb-4" style="font-family: var(--font-display);">{{ $currency }}</h3>
                    <div class="space-y-4 text-sm text-foreground/70">
                        <div>
                            <p class="text-foreground/50 mb-1">Gold</p>
                            @if ($gold)
                                <p>1 oz: {{ number_format($gold->price_oz, 2) }} {{ $currency }}</p>
                                <p>0.5 kg: {{ number_format($gold->price_half_kg, 2) }} {{ $currency }}</p>
                                <p>1 kg: {{ number_format($gold->price_kg, 2) }} {{ $currency }}</p>
                            @else
                                <p class="text-foreground/50">Unavailable</p>
                            @endif
                        </div>
                        <div>
                            <p class="text-foreground/50 mb-1">Silver</p>
                            @if ($silver)
                                <p>1 oz: {{ number_format($silver->price_oz, 2) }} {{ $currency }}</p>
                                <p>0.5 kg: {{ number_format($silver->price_half_kg, 2) }} {{ $currency }}</p>
                                <p>1 kg: {{ number_format($silver->price_kg, 2) }} {{ $currency }}</p>
                            @else
                                <p class="text-foreground/50">Unavailable</p>
                            @endif
                        </div>
                    </div>
                    <p class="text-xs text-foreground/40 mt-4">
                        Last updated: {{ optional($gold?->fetched_at ?? $silver?->fetched_at)->format('M j, Y H:i') ?? '—' }}
                    </p>
                </div>
            @endforeach
        </div>
    @endif
</div>
