@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen bg-background overflow-x-hidden" style="font-family: var(--font-body);">
        <div class="fixed inset-0 -z-10">
            <div class="absolute inset-0">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[100px]"></div>
                <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[100px]"></div>
                <div class="absolute inset-0 opacity-[0.02]"
                     style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%238BD4E2' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);">
                </div>
            </div>
        </div>

        <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-700">
            <div id="site-nav" class="transition-all duration-700">
                <div class="max-w-[1600px] mx-auto px-6 md:px-12 py-6 flex items-center justify-between">
                    <a href="#hero" class="flex items-center gap-3 group">
                        <div class="flex flex-col">
                            <span class="text-xl tracking-[0.2em] uppercase text-white transition-colors duration-500 group-hover:text-primary"
                                  style="font-family: var(--font-display); font-weight: 400;">
                                NAZLEH
                            </span>
                        </div>
                    </a>

                    <div class="hidden md:flex items-center gap-10">
                        <a href="#about" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                           style="font-family: var(--font-body); font-weight: 400;">
                            About
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="#collection" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                           style="font-family: var(--font-body); font-weight: 400;">
                            Collection
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="#verification" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                           style="font-family: var(--font-body); font-weight: 400;">
                            Verification
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="#contact" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                           style="font-family: var(--font-body); font-weight: 400;">
                            Contact
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('marketing.heritage') }}" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                           style="font-family: var(--font-body); font-weight: 400;">
                            Heritage
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('marketing.assay') }}" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group"
                           style="font-family: var(--font-body); font-weight: 400;">
                            Assay
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                    </div>

                    <div class="w-8 h-px bg-primary/30 hidden lg:block"></div>
                </div>
            </div>
        </nav>

        <section id="hero" class="relative h-screen flex items-center justify-center overflow-hidden pt-32 md:pt-36">
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
            </div>

            <div class="relative z-10 flex flex-col items-center text-center px-6 md:px-12 max-w-5xl mx-auto">
                <div class="mb-12 md:mb-16 reveal-scale">
                    <div class="w-48 h-48 md:w-64 md:h-64 flex items-center justify-center">
                        <img
                            src="{{ asset('images/nazleh-monogram-light.png') }}"
                            alt="Nazleh Goldsmith Monogram"
                            class="w-full h-full object-contain opacity-90 mt-40"
                        />
                    </div>
                </div>

                <h1 class="mb-6 md:mb-8 reveal" style="font-family: var(--font-display);">
                    <span class="block text-[3rem] md:text-[5rem] lg:text-[6.5rem] tracking-[0.15em] uppercase text-white" style="font-weight: 300; letter-spacing: 0.2em;">
                        NAZLEH
                    </span>
                    <span class="block text-[2rem] md:text-[3rem] lg:text-[4rem] tracking-[0.25em] uppercase text-primary mt-2" style="font-weight: 400; letter-spacing: 0.3em;">
                        GOLDSMITH
                    </span>
                </h1>

                <p class="text-lg md:text-xl tracking-[0.3em] uppercase text-white/70 mb-12 md:mb-16 reveal" style="font-family: var(--font-body); font-weight: 300;">
                    Handcrafted Gold &amp; Silver Alloys
                </p>

                <div class="w-24 h-px bg-primary mb-12 md:mb-16 reveal-line"></div>

                <a href="#collection"
                   class="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]"
                   style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 400;">
                    <span class="relative z-10">Explore Collection</span>
                    <span class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5"></span>
                </a>
            </div>

            <div class="absolute bottom-12 left-1/2 -translate-x-1/2">
                <div class="w-px h-16 bg-gradient-to-b from-transparent via-primary to-transparent"></div>
            </div>
        </section>

        <section id="about" class="relative py-32 md:py-48 px-6 md:px-12">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent opacity-30"></div>

            <div class="relative z-10 max-w-6xl mx-auto">
                <div class="mb-16 md:mb-24 reveal">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-12 h-px bg-primary"></div>
                        <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            Philosophy
                        </span>
                    </div>
                </div>

                <div class="mb-20 md:mb-32 reveal">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl leading-tight text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">
                        Every bar tells a story<br />of precision and permanence
                    </h2>
                    <p class="text-lg md:text-xl text-white/60 max-w-3xl leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                        We craft gold and silver alloys with an unwavering commitment to purity, authenticity, and long-term value. Each piece is handcrafted to meet the highest standards of excellence.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">
                    <div class="group reveal">
                        <div class="w-16 h-px bg-primary/30 mb-8 transition-all duration-700 group-hover:w-24 group-hover:bg-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.5)]"></div>
                        <h3 class="text-2xl md:text-3xl mb-4 text-white" style="font-family: var(--font-display); font-weight: 400;">
                            Craftsmanship
                        </h3>
                        <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                            Meticulous attention to every detail, ensuring each alloy meets exacting specifications.
                        </p>
                    </div>
                    <div class="group reveal">
                        <div class="w-16 h-px bg-primary/30 mb-8 transition-all duration-700 group-hover:w-24 group-hover:bg-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.5)]"></div>
                        <h3 class="text-2xl md:text-3xl mb-4 text-white" style="font-family: var(--font-display); font-weight: 400;">
                            Purity
                        </h3>
                        <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                            Only the finest materials, refined to investment-grade standards.
                        </p>
                    </div>
                    <div class="group reveal">
                        <div class="w-16 h-px bg-primary/30 mb-8 transition-all duration-700 group-hover:w-24 group-hover:bg-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.5)]"></div>
                        <h3 class="text-2xl md:text-3xl mb-4 text-white" style="font-family: var(--font-display); font-weight: 400;">
                            Trust
                        </h3>
                        <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                            Complete transparency and verification for every piece we create.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="collection" class="relative py-32 md:py-48 px-6 md:px-12">
            <div class="max-w-7xl mx-auto">
                <div class="mb-20 md:mb-32 reveal">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-12 h-px bg-primary"></div>
                        <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            Collection
                        </span>
                    </div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl text-white max-w-3xl" style="font-family: var(--font-display); font-weight: 300;">
                        Gold &amp; Silver Alloys
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                    @php
                        $alloys = [
                            [
                                'title' => '24K Gold Bar',
                                'purity' => '999.9 Fine Gold',
                                'weight' => '1 Troy Ounce',
                                'image' => 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080',
                            ],
                            [
                                'title' => 'Silver Bullion',
                                'purity' => '999 Fine Silver',
                                'weight' => '10 Troy Ounces',
                                'image' => 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080',
                            ],
                            [
                                'title' => 'Gold Ingot',
                                'purity' => '999.9 Fine Gold',
                                'weight' => '5 Troy Ounces',
                                'image' => 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080',
                            ],
                            [
                                'title' => '22K Gold Alloy',
                                'purity' => '916 Fine Gold',
                                'weight' => '50 Grams',
                                'image' => 'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080',
                            ],
                            [
                                'title' => 'Silver Bar',
                                'purity' => '999 Fine Silver',
                                'weight' => '1 Kilogram',
                                'image' => 'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080',
                            ],
                            [
                                'title' => 'Gold Bar',
                                'purity' => '999.9 Fine Gold',
                                'weight' => '100 Grams',
                                'image' => 'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080',
                            ],
                        ];
                    @endphp

                    @foreach ($alloys as $alloy)
                        <div class="group cursor-pointer reveal">
                            <div class="relative aspect-[4/5] mb-6 overflow-hidden bg-muted/5">
                                <img src="{{ $alloy['image'] }}" alt="{{ $alloy['title'] }}"
                                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/20 to-transparent opacity-0 transition-all duration-700 group-hover:opacity-100"></div>
                                <div class="absolute inset-0 border border-transparent transition-all duration-700 group-hover:border-primary/40 group-hover:shadow-[inset_0_0_40px_rgba(139,212,226,0.15)]"></div>
                            </div>

                            <div class="space-y-3">
                                <h3 class="text-xl md:text-2xl text-white transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">
                                    {{ $alloy['title'] }}
                                </h3>
                                <div class="space-y-1">
                                    <p class="text-sm tracking-[0.15em] text-white/50" style="font-family: var(--font-body); font-weight: 300;">
                                        {{ $alloy['purity'] }}
                                    </p>
                                    <p class="text-sm tracking-[0.15em] text-white/50" style="font-family: var(--font-body); font-weight: 300;">
                                        {{ $alloy['weight'] }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                    <div class="w-8 h-px bg-primary"></div>
                                    <span class="text-xs tracking-[0.2em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">
                                        View Details
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="relative py-32 md:py-48 px-6 md:px-12">
            <div class="absolute inset-0 flex items-center justify-center opacity-[0.02]">
                <div class="text-[20rem] md:text-[30rem] font-serif text-primary select-none">
                    "
                </div>
            </div>

            <div class="relative z-10 max-w-5xl mx-auto text-center">
                <div class="w-32 h-px bg-gradient-to-r from-transparent via-primary to-transparent mx-auto mb-16 reveal-line"></div>
                <blockquote class="space-y-8 md:space-y-12 reveal">
                    <p class="text-3xl md:text-4xl lg:text-5xl text-white leading-relaxed" style="font-family: var(--font-display); font-weight: 300;">
                        "In an age of digital currencies and fleeting investments,
                        <span class="text-primary">gold and silver</span> remain the timeless guardians of wealth"
                    </p>
                    <footer class="flex flex-col items-center gap-4">
                        <div class="w-16 h-px bg-primary/30"></div>
                        <cite class="not-italic text-sm tracking-[0.3em] uppercase text-white/50" style="font-family: var(--font-body); font-weight: 300;">
                            Nazleh Philosophy
                        </cite>
                    </footer>
                </blockquote>
                <div class="w-32 h-px bg-gradient-to-r from-transparent via-primary to-transparent mx-auto mt-16 reveal-line"></div>
            </div>
        </section>

        <section id="verification" class="relative py-32 md:py-48 px-6 md:px-12">
            <div class="absolute inset-0 bg-gradient-to-b from-primary/5 via-transparent to-primary/5 opacity-30"></div>

            <div class="relative z-10 max-w-7xl mx-auto">
                <div class="mb-20 md:mb-32 max-w-4xl mx-auto text-center reveal">
                    <div class="flex items-center justify-center gap-6 mb-8">
                        <div class="w-12 h-px bg-primary"></div>
                        <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            Verification
                        </span>
                        <div class="w-12 h-px bg-primary"></div>
                    </div>

                    <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">
                        Trust Through Transparency
                    </h2>

                    <p class="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                        Every Nazleh bar undergoes rigorous verification processes to ensure complete authenticity and value preservation.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                    @php
                        $features = [
                            [
                                'title' => 'Authenticity Guarantee',
                                'description' => 'Every piece comes with a certificate of authenticity, ensuring investment-grade quality.',
                                'icon' => 'shield',
                            ],
                            [
                                'title' => 'Unique Identification',
                                'description' => 'Individual serial numbers and hallmarks for complete traceability.',
                                'icon' => 'fingerprint',
                            ],
                            [
                                'title' => 'Third-Party Verification',
                                'description' => 'Independently certified by recognized assay offices and institutions.',
                                'icon' => 'check',
                            ],
                            [
                                'title' => 'Digital Verification',
                                'description' => 'Scan QR codes to instantly verify purity, weight, and origin.',
                                'icon' => 'qr',
                            ],
                        ];
                    @endphp

                    @foreach ($features as $feature)
                        <div class="group reveal">
                            <div class="mb-8 relative inline-block">
                                <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                                <div class="relative w-16 h-16 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                                    @if ($feature['icon'] === 'shield')
                                        <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M12 2l7 4v6c0 5-3.5 9.5-7 10-3.5-.5-7-5-7-10V6l7-4z"></path>
                                        </svg>
                                    @elseif ($feature['icon'] === 'fingerprint')
                                        <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M8 11a4 4 0 0 1 8 0"></path>
                                            <path d="M12 11v6"></path>
                                            <path d="M5 11c0-3.9 3.1-7 7-7s7 3.1 7 7"></path>
                                            <path d="M7 17c.5 2 2.2 3.5 5 4"></path>
                                        </svg>
                                    @elseif ($feature['icon'] === 'check')
                                        <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M9 12l2 2 4-4"></path>
                                            <path d="M7 3h10l4 4v14H3V3h4z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                            <path d="M7 7h4v4H7z"></path>
                                            <path d="M13 7h4v4h-4z"></path>
                                            <path d="M7 13h4v4H7z"></path>
                                            <path d="M13 13h4v4h-4z"></path>
                                        </svg>
                                    @endif
                                </div>
                            </div>

                            <h3 class="text-2xl md:text-3xl text-white mb-4 transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">
                                {{ $feature['title'] }}
                            </h3>

                            <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                                {{ $feature['description'] }}
                            </p>

                            <div class="mt-8 w-16 h-px bg-primary/30 transition-all duration-700 group-hover:w-24 group-hover:bg-primary"></div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-24 md:mt-32 text-center reveal">
                    <p class="text-white/70 mb-8 tracking-[0.15em] uppercase" style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 400;">
                        Request Verification Documentation
                    </p>

                    <a href="#contact" class="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]" style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 400;">
                        <span class="relative z-10">Contact Us</span>
                        <span class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5"></span>
                    </a>
                </div>
            </div>
        </section>

        <footer id="contact" class="relative py-20 md:py-24 px-6 md:px-12 border-t border-primary/10">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col items-center mb-12 reveal">
                    <div class="mb-8">
                        <img src="{{ asset('images/nazleh-monogram-dark.png') }}" alt="Nazleh Goldsmith" class="w-16 h-16 md:w-20 md:h-20 object-contain opacity-80">
                    </div>

                    <div class="text-center">
                        <h3 class="text-2xl md:text-3xl mb-2" style="font-family: var(--font-display); font-weight: 300; letter-spacing: 0.2em; color: white;">
                            NAZLEH GOLDSMITH
                        </h3>
                        <p class="text-sm tracking-[0.3em] uppercase text-white/50" style="font-family: var(--font-body); font-weight: 300;">
                            Handcrafted Precious Metal Alloys
                        </p>
                    </div>
                </div>

                <div class="w-full h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent mb-12 reveal-line"></div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-8 reveal">
                    <nav class="flex flex-wrap items-center justify-center gap-8 md:gap-12">
                        <a href="#about" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            About
                        </a>
                        <a href="#collection" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            Collection
                        </a>
                        <a href="#verification" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            Verification
                        </a>
                        <a href="#contact" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">
                            Contact
                        </a>
                    </nav>

                    <p class="text-sm text-white/30" style="font-family: var(--font-body); font-weight: 300;">
                        © 2026 Nazleh Goldsmith
                    </p>
                </div>

                <div class="mt-12 flex justify-center reveal">
                    <div class="w-1 h-1 rounded-full bg-primary/50"></div>
                </div>
            </div>
        </footer>
    </div>
@endsection
