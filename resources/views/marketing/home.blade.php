@extends('layouts.marketing')

@section('content')
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
        </div>

        <div class="relative z-10 flex flex-col items-center text-center px-6 md:px-12 max-w-5xl mx-auto">
            <div class="mb-12 md:mb-16 mt-28 md:mt-36 reveal-scale" data-reveal>
                <div class="w-48 h-48 md:w-64 md:h-64 flex items-center justify-center">
                    <img src="{{ asset('images/nazleh/monogram-light.png') }}" alt="Nazleh Ounce Monogram" class="w-full h-full object-contain opacity-90 mt-48" />
                </div>
            </div>

          <h1 class="mb-6 md:mb-8 reveal" data-reveal data-delay="200" style="font-family: var(--font-display); font-weight: 300;">
                <span class="block text-[3rem] md:text-[5rem] lg:text-[6.5rem] tracking-[0.15em] uppercase text-white" style="font-weight: 300; letter-spacing: 0.2em;">
                    {{ $content['hero']['title'] }}
                </span>
            </h1>

            <p class="text-lg md:text-xl tracking-[0.3em] uppercase text-white/70 mb-12 md:mb-16 reveal" data-reveal data-delay="400" style="font-family: var(--font-body); font-weight: 300;">
                {{ $content['hero']['subtitle'] }}
            </p>
            <p class="text-sm md:text-base text-white/50 max-w-2xl mb-10 reveal" data-reveal data-delay="480" style="font-family: var(--font-body); font-weight: 300;">
                {{ $content['hero']['description'] }}
            </p>

            <div class="w-24 h-px bg-primary mb-12 md:mb-16 reveal-line" data-reveal data-delay="560"></div>

            <a href="{{ url('/collection') }}" class="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)] reveal" data-reveal data-delay="650" style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 400;">
                <span class="relative z-10">Explore Collection</span>
                <div class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5"></div>
            </a>
        </div>

        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 reveal-fade" data-reveal data-delay="800">
            <div class="w-px h-16 bg-gradient-to-b from-transparent via-primary to-transparent animate-pulse"></div>
        </div>
    </section>

    <section class="relative py-20 md:py-32 overflow-hidden">
        <div class="relative max-w-6xl mx-auto px-6 md:px-12" data-slider="luxury">
            <div class="luxury-slider h-[60vh] md:h-[70vh]">
                <div class="luxury-slide is-active" data-slide>
                    <div class="relative h-[60vh] md:h-[70vh] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1768359666502-306694fa6fcf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBnb2xkJTIwYmFycyUyMHZhdWx0fGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" alt="Secured Excellence" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent"></div>
                        <div class="absolute inset-0 flex items-end justify-center pb-24 md:pb-32">
                            <div class="text-center px-6">
                                <h3 class="text-3xl md:text-5xl lg:text-6xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">Secured Excellence</h3>
                                <p class="text-sm md:text-base tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 300;">Premium vault storage</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="luxury-slide" data-slide>
                    <div class="relative h-[60vh] md:h-[70vh] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1598724168411-9ba1e003a7fe?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFscyUyMGNyYWZ0c21hbnNoaXAlMjBhcnRpc2FufGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" alt="Master Craftsmanship" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent"></div>
                        <div class="absolute inset-0 flex items-end justify-center pb-24 md:pb-32">
                            <div class="text-center px-6">
                                <h3 class="text-3xl md:text-5xl lg:text-6xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">Master Craftsmanship</h3>
                                <p class="text-sm md:text-base tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 300;">Artisan precision</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="luxury-slide" data-slide>
                    <div class="relative h-[60vh] md:h-[70vh] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" alt="Curated Collection" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent"></div>
                        <div class="absolute inset-0 flex items-end justify-center pb-24 md:pb-32">
                            <div class="text-center px-6">
                                <h3 class="text-3xl md:text-5xl lg:text-6xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">Curated Collection</h3>
                                <p class="text-sm md:text-base tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 300;">Investment grade metals</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="luxury-slide" data-slide>
                    <div class="relative h-[60vh] md:h-[70vh] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1522255272218-7ac5249be344?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBiYW5raW5nJTIwcHJpdmF0ZSUyMHdlYWx0aHxlbnwxfHx8fDE3NzAwMjQ2Mzd8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" alt="Private Wealth" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent"></div>
                        <div class="absolute inset-0 flex items-end justify-center pb-24 md:pb-32">
                            <div class="text-center px-6">
                                <h3 class="text-3xl md:text-5xl lg:text-6xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">Private Wealth</h3>
                                <p class="text-sm md:text-base tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 300;">Exclusive service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute top-1/2 -translate-y-1/2 left-0 right-0 z-10 pointer-events-none">
                <div class="max-w-7xl mx-auto px-6 md:px-12 flex items-center justify-between">
                    <button data-prev class="pointer-events-auto group w-12 h-12 flex items-center justify-center border border-white/20 transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                        <span class="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary">&#x2039;</span>
                    </button>
                    <button data-next class="pointer-events-auto group w-12 h-12 flex items-center justify-center border border-white/20 transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                        <span class="w-5 h-5 text-white/70 transition-colors duration-500 group-hover:text-primary">&#x203A;</span>
                    </button>
                </div>
            </div>

            <div class="relative bottom-8 mt-8">
                <div class="luxury-dots flex items-center justify-center gap-3">
                    <button data-dot class="is-active"></button>
                    <button data-dot></button>
                    <button data-dot></button>
                    <button data-dot></button>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                <div class="reveal-left" data-reveal>
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-12 h-px bg-primary"></div>
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">{{ $content['about']['title'] }}</span>
                    </div>

            <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">{{ $content['about']['subtitle'] }}</h2>

                    <div class="space-y-6 text-lg text-white/60 leading-relaxed mb-12" style="font-family: var(--font-body); font-weight: 300;">
              <p>{{ $content['about']['description'] }}</p>
                    </div>

                    <a href="{{ url('/about') }}" class="inline-flex items-center gap-4 group">
                        <span class="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style="font-family: var(--font-body); font-weight: 400;">Discover Our Story</span>
                        <div class="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24"></div>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 reveal-right" data-reveal>
                    <div class="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
                        <div class="text-5xl text-primary mb-4" style="font-family: var(--font-display); font-weight: 300;">01</div>
                        <h3 class="text-xl text-white mb-3" style="font-family: var(--font-display); font-weight: 400;">Authenticity</h3>
                        <p class="text-white/50 text-sm leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Certified quality and verifiable provenance</p>
                    </div>
                    <div class="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
                        <div class="text-5xl text-primary mb-4" style="font-family: var(--font-display); font-weight: 300;">02</div>
                        <h3 class="text-xl text-white mb-3" style="font-family: var(--font-display); font-weight: 400;">Transparency</h3>
                        <p class="text-white/50 text-sm leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Complete documentation and QR verification</p>
                    </div>
                    <div class="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
                        <div class="text-5xl text-primary mb-4" style="font-family: var(--font-display); font-weight: 300;">03</div>
                        <h3 class="text-xl text-white mb-3" style="font-family: var(--font-display); font-weight: 400;">Excellence</h3>
                        <p class="text-white/50 text-sm leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Investment-grade precious metals</p>
                    </div>
                    <div class="group border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.1)]">
                        <div class="text-5xl text-primary mb-4" style="font-family: var(--font-display); font-weight: 300;">04</div>
                        <h3 class="text-xl text-white mb-3" style="font-family: var(--font-display); font-weight: 400;">Legacy</h3>
                        <p class="text-white/50 text-sm leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Generational wealth preservation</p>
                    </div>
                </div>
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
          <h2 class="text-4xl md:text-5xl lg:text-6xl text-white max-w-3xl mb-8" style="font-family: var(--font-display); font-weight: 300;">{{ $content['collection']['sectionTitle'] }}</h2>
                <p class="text-lg text-white/60 max-w-2xl mb-12" style="font-family: var(--font-body);">A curated selection of investment-grade precious metals</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 mb-16">
                @php
                    $alloys = [
                        ['title' => '24K Gold Bar', 'purity' => '999.9 Fine Gold', 'weight' => '1 Troy Ounce', 'image' => 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral'],
                        ['title' => 'Silver Bullion', 'purity' => '999 Fine Silver', 'weight' => '10 Troy Ounces', 'image' => 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral'],
                        ['title' => 'Gold Ingot', 'purity' => '999.9 Fine Gold', 'weight' => '5 Troy Ounces', 'image' => 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral'],
                    ];
                @endphp
                @foreach ($alloys as $index => $alloy)
                    <div class="reveal" data-reveal data-delay="{{ $index * 120 }}">
                        <div class="group cursor-pointer">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center reveal-fade" data-reveal data-delay="400">
                <a href="{{ url('/collection') }}" class="inline-flex items-center gap-4 group">
                    <span class="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style="font-family: var(--font-body); font-weight: 400;">View Full Collection</span>
                    <div class="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/5 via-transparent to-primary/5 opacity-30"></div>
        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="mb-20 md:mb-32 max-w-4xl mx-auto text-center reveal" data-reveal>
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
            <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">{{ $content['verification']['title'] }}</span>
                    <div class="w-12 h-px bg-primary"></div>
                </div>
          <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">{{ $content['verification']['subtitle'] }}</h2>
                <p class="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
            {{ $content['verification']['description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 mb-16">
                <div class="reveal" data-reveal data-delay="150">
                    <div class="group">
                        <div class="mb-8 relative inline-block">
                            <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                            <div class="relative w-16 h-16 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                                <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"></path>
                                    <path d="M9 12l2 2 4-4"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl md:text-3xl text-white mb-4 transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">Authenticity Guarantee</h3>
                        <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Every piece comes with a certificate of authenticity, ensuring investment-grade quality.</p>
                        <div class="mt-8 w-16 h-px bg-primary/30 transition-all duration-700 group-hover:w-24 group-hover:bg-primary"></div>
                    </div>
                </div>
                <div class="reveal" data-reveal data-delay="300">
                    <div class="group">
                        <div class="mb-8 relative inline-block">
                            <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                            <div class="relative w-16 h-16 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                                <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 4a4 4 0 0 0-4 4v3"></path>
                                    <path d="M12 4a4 4 0 0 1 4 4v1"></path>
                                    <path d="M8 17a4 4 0 0 0 8 0v-1"></path>
                                    <path d="M8 11v6"></path>
                                    <path d="M16 9v8"></path>
                                    <path d="M12 12v6"></path>
                                    <path d="M6 20h12"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl md:text-3xl text-white mb-4 transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">Unique Identification</h3>
                        <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Individual serial numbers and hallmarks for complete traceability.</p>
                        <div class="mt-8 w-16 h-px bg-primary/30 transition-all duration-700 group-hover:w-24 group-hover:bg-primary"></div>
                    </div>
                </div>
            </div>

            <div class="text-center reveal-fade" data-reveal data-delay="500">
                <a href="{{ url('/verification') }}" class="inline-flex items-center gap-4 group">
                    <span class="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style="font-family: var(--font-body); font-weight: 400;">Learn More About Our Verification</span>
                    <div class="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12 border-t border-primary/10">
        <div class="max-w-7xl mx-auto">
            <div class="mb-20 md:mb-32 text-center max-w-3xl mx-auto reveal" data-reveal>
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
            <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">{{ $content['contact']['title'] }}</span>
                    <div class="w-12 h-px bg-primary"></div>
                </div>
          <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">{{ $content['contact']['subtitle'] }}</h2>
                <p class="text-lg md:text-xl text-white/60 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Connect with our team for personalized consultation and expert guidance in precious metal investments.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-16">
        <a href="mailto:{{ $content['contact']['email'] }}" class="reveal" data-reveal data-delay="100">
                    <div class="group relative border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.15)]">
                        <div class="mb-6 relative inline-block">
                            <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                            <div class="relative w-12 h-12 flex items-center justify-center">
                                <span class="w-6 h-6 text-primary">@</span>
                            </div>
                        </div>
                        <div class="text-xs tracking-[0.3em] uppercase text-white/40 mb-3" style="font-family: var(--font-body); font-weight: 400;">Email</div>
                  <div class="text-lg text-white transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['email'] }}</div>
                    </div>
                </a>
                <a href="tel:{{ preg_replace('/\\D+/', '', $content['contact']['phone']) }}" class="reveal" data-reveal data-delay="220">
                    <div class="group relative border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.15)]">
                        <div class="mb-6 relative inline-block">
                            <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                            <div class="relative w-12 h-12 flex items-center justify-center">
                                <span class="w-6 h-6 text-primary">&#x260E;</span>
                            </div>
                        </div>
                        <div class="text-xs tracking-[0.3em] uppercase text-white/40 mb-3" style="font-family: var(--font-body); font-weight: 400;">Phone</div>
                        <div class="text-lg text-white transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['phone'] }}</div>
                    </div>
                </a>
                <div class="reveal" data-reveal data-delay="320">
                    <div class="group relative border border-primary/20 p-8 transition-all duration-700 hover:border-primary/50 hover:shadow-[0_0_30px_rgba(139,212,226,0.15)]">
                        <div class="mb-6 relative inline-block">
                            <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                            <div class="relative w-12 h-12 flex items-center justify-center">
                                <span class="w-6 h-6 text-primary">&#x2609;</span>
                            </div>
                        </div>
                        <div class="text-xs tracking-[0.3em] uppercase text-white/40 mb-3" style="font-family: var(--font-body); font-weight: 400;">Location</div>
                        <div class="text-lg text-white transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['address'] }}</div>
                    </div>
                </div>
            </div>

            <div class="text-center reveal-fade" data-reveal data-delay="500">
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-4 group">
                    <span class="text-sm tracking-[0.25em] uppercase text-primary transition-all duration-500 group-hover:tracking-[0.3em]" style="font-family: var(--font-body); font-weight: 400;">Get In Touch</span>
                    <div class="w-16 h-px bg-primary transition-all duration-500 group-hover:w-24"></div>
                </a>
            </div>
        </div>
    </section>

    @include('marketing.partials.footer')
@endsection
