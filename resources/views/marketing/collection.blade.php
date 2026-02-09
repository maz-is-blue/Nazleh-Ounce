@extends('layouts.marketing')

@section('content')
    <section class="min-h-[60vh] flex items-center justify-center relative pt-24">
        <div class="max-w-4xl mx-auto px-6 md:px-12 text-center">
            <div class="reveal" data-reveal>
                <h1 class="text-5xl md:text-7xl mb-6 text-white" style="font-family: var(--font-display); font-weight: 400;">{{ $content['collection']['heroTitle'] }}</h1>
                <p class="text-lg md:text-xl text-white/70 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body);">{{ $content['collection']['heroDescription'] }}</p>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="mb-20 md:mb-32 reveal" data-reveal>
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">{{ $content['collection']['sectionLabel'] }}</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl text-white max-w-3xl" style="font-family: var(--font-display); font-weight: 300;">{{ $content['collection']['sectionTitle'] }}</h2>
            </div>

            @php
                $alloys = [
                    ['title' => '24K Gold Bar', 'purity' => '999.9 Fine Gold', 'weight' => '1 Troy Ounce', 'image' => 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral', 'slug' => '24k-gold-bar'],
                    ['title' => 'Silver Bullion', 'purity' => '999 Fine Silver', 'weight' => '10 Troy Ounces', 'image' => 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral', 'slug' => 'silver-bullion'],
                    ['title' => 'Gold Ingot', 'purity' => '999.9 Fine Gold', 'weight' => '5 Troy Ounces', 'image' => 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral', 'slug' => 'gold-ingot'],
                    ['title' => '22K Gold Alloy', 'purity' => '916 Fine Gold', 'weight' => '50 Grams', 'image' => 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral', 'slug' => '22k-gold-alloy'],
                    ['title' => 'Silver Bar', 'purity' => '999 Fine Silver', 'weight' => '1 Kilogram', 'image' => 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral', 'slug' => 'silver-bar'],
                    ['title' => 'Gold Bar', 'purity' => '999.9 Fine Gold', 'weight' => '100 Grams', 'image' => 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral', 'slug' => 'gold-bar'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                @foreach ($alloys as $index => $alloy)
                    <div class="reveal" data-reveal data-delay="{{ $index * 120 }}">
                        <a href="{{ url('/collection/' . $alloy['slug']) }}" class="group cursor-pointer block">
                            <div class="relative aspect-[4/5] mb-6 overflow-hidden bg-muted/5">
                                <img src="{{ $alloy['image'] }}" alt="{{ $alloy['title'] }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" />
                                <div class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/20 to-transparent opacity-0 transition-all duration-700 group-hover:opacity-100"></div>
                                <div class="absolute inset-0 border border-transparent transition-all duration-700 group-hover:border-primary/40 group-hover:shadow-[inset_0_0_40px_rgba(139,212,226,0.15)]"></div>
                            </div>
                            <div class="space-y-3">
                                <h3 class="text-xl md:text-2xl text-white transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">{{ $alloy['title'] }}</h3>
                                <div class="space-y-1">
                                    <p class="text-sm tracking-[0.15em] text-white/50" style="font-family: var(--font-body); font-weight: 300;">{{ $alloy['purity'] }}</p>
                                    <p class="text-sm tracking-[0.15em] text-white/50" style="font-family: var(--font-body); font-weight: 300;">{{ $alloy['weight'] }}</p>
                                </div>
                                <div class="flex items-center gap-3 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                    <div class="w-8 h-px bg-primary"></div>
                                    <span class="text-xs tracking-[0.2em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">View Details</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12 bg-gradient-to-b from-transparent via-primary/5 to-transparent" data-slider="showcase">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 text-center reveal" data-reveal>
                <h2 class="text-3xl md:text-4xl lg:text-5xl text-white mb-6" style="font-family: var(--font-display); font-weight: 300;">Featured Pieces</h2>
                <div class="w-24 h-px bg-primary mx-auto"></div>
            </div>

            @php
                $showcase = [
                    [
                        'title' => '24K Gold Bar - 1oz',
                        'purity' => '999.9 Fine Gold',
                        'weight' => '1 Troy Ounce (31.1g)',
                        'dimensions' => '50mm x 28mm x 2mm',
                        'image' => 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                        'description' => 'Investment-grade gold bar featuring precision-minted finish and laser-engraved serial number.'
                    ],
                    [
                        'title' => 'Silver Bullion - 10oz',
                        'purity' => '999 Fine Silver',
                        'weight' => '10 Troy Ounces (311g)',
                        'dimensions' => '90mm x 52mm x 8mm',
                        'image' => 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                        'description' => 'Premium silver bar with mirror-like finish and individually numbered certificate of authenticity.'
                    ],
                    [
                        'title' => 'Gold Ingot - 5oz',
                        'purity' => '999.9 Fine Gold',
                        'weight' => '5 Troy Ounces (155.5g)',
                        'dimensions' => '80mm x 40mm x 5mm',
                        'image' => 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                        'description' => 'Substantial gold ingot with refined casting marks and tamper-evident security packaging.'
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="reveal-left" data-reveal>
                    <div class="showcase-panel" data-showcase-group="image">
                        @foreach ($showcase as $index => $item)
                            <div class="showcase-item {{ $index === 0 ? 'is-active' : '' }}" data-showcase-item>
                                <div class="relative aspect-square overflow-hidden border border-primary/20">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-background/40 via-transparent to-transparent"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex items-center justify-center gap-4 mt-8">
                        <button data-showcase-prev class="group w-10 h-10 flex items-center justify-center border border-primary/30 transition-all duration-700 hover:border-primary hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]">
                            <span class="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary">&#x2039;</span>
                        </button>
                        <div class="flex gap-2">
                            @foreach ($showcase as $index => $item)
                                <button data-showcase-dot class="showcase-dot {{ $index === 0 ? 'is-active' : '' }}"></button>
                            @endforeach
                        </div>
                        <button data-showcase-next class="group w-10 h-10 flex items-center justify-center border border-primary/30 transition-all duration-700 hover:border-primary hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]">
                            <span class="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary">&#x203A;</span>
                        </button>
                    </div>
                </div>

                <div class="reveal-right" data-reveal>
                    <div class="showcase-panel" data-showcase-group="detail">
                        @foreach ($showcase as $index => $item)
                            <div class="showcase-item {{ $index === 0 ? 'is-active' : '' }}" data-showcase-item>
                                <h3 class="text-3xl md:text-4xl text-white mb-6" style="font-family: var(--font-display); font-weight: 400;">{{ $item['title'] }}</h3>
                                <p class="text-lg text-white/70 leading-relaxed mb-8" style="font-family: var(--font-body); font-weight: 300;">{{ $item['description'] }}</p>
                                <div class="space-y-4 border-l-2 border-primary/30 pl-6">
                                    <div>
                                        <div class="text-xs tracking-[0.3em] uppercase text-white/40 mb-1" style="font-family: var(--font-body); font-weight: 400;">Purity</div>
                                        <div class="text-base text-primary" style="font-family: var(--font-body); font-weight: 300;">{{ $item['purity'] }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs tracking-[0.3em] uppercase text-white/40 mb-1" style="font-family: var(--font-body); font-weight: 400;">Weight</div>
                                        <div class="text-base text-primary" style="font-family: var(--font-body); font-weight: 300;">{{ $item['weight'] }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs tracking-[0.3em] uppercase text-white/40 mb-1" style="font-family: var(--font-body); font-weight: 400;">Dimensions</div>
                                        <div class="text-base text-primary" style="font-family: var(--font-body); font-weight: 300;">{{ $item['dimensions'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('marketing.partials.footer')
@endsection
