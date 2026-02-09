@extends('layouts.marketing')

@section('content')
    <section class="min-h-[60vh] flex items-center justify-center relative pt-24">
        <div class="max-w-4xl mx-auto px-6 md:px-12 text-center">
            <div class="reveal" data-reveal>
                <h1 class="text-5xl md:text-7xl mb-6 text-white" style="font-family: var(--font-display); font-weight: 400;">{{ $content['verification']['title'] }}</h1>
                <p class="text-lg md:text-xl text-white/70 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body);">{{ $content['verification']['description'] }}</p>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/5 via-transparent to-primary/5 opacity-30"></div>
        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="mb-20 md:mb-32 max-w-4xl mx-auto text-center reveal" data-reveal>
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">Verification</span>
                    <div class="w-12 h-px bg-primary"></div>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">{{ $content['verification']['subtitle'] }}</h2>
                <p class="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">{{ $content['verification']['description'] }}</p>
            </div>

            @php
                $features = [
                    ['title' => 'Authenticity Guarantee', 'description' => 'Every piece comes with a certificate of authenticity, ensuring investment-grade quality.', 'icon' => 'shield'],
                    ['title' => 'Unique Identification', 'description' => 'Individual serial numbers and hallmarks for complete traceability.', 'icon' => 'fingerprint'],
                    ['title' => 'Third-Party Verification', 'description' => 'Independently certified by recognized assay offices and institutions.', 'icon' => 'file-check'],
                    ['title' => 'Digital Verification', 'description' => 'Scan QR codes to instantly verify purity, weight, and origin.', 'icon' => 'qr'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
                @foreach ($features as $index => $feature)
                    <div class="reveal" data-reveal data-delay="{{ 200 + $index * 120 }}">
                        <div class="group">
                            <div class="mb-8 relative inline-block">
                                <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                                <div class="relative w-16 h-16 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                                    @switch($feature['icon'])
                                        @case('shield')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"></path>
                                                <path d="M9 12l2 2 4-4"></path>
                                            </svg>
                                            @break
                                        @case('fingerprint')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 4a4 4 0 0 0-4 4v3"></path>
                                                <path d="M12 4a4 4 0 0 1 4 4v1"></path>
                                                <path d="M8 17a4 4 0 0 0 8 0v-1"></path>
                                                <path d="M8 11v6"></path>
                                                <path d="M16 9v8"></path>
                                                <path d="M12 12v6"></path>
                                                <path d="M6 20h12"></path>
                                            </svg>
                                            @break
                                        @case('file-check')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <path d="M14 2v6h6"></path>
                                                <path d="M9 14l2 2 4-4"></path>
                                            </svg>
                                            @break
                                        @case('qr')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M3 3h7v7H3z"></path>
                                                <path d="M14 3h7v7h-7z"></path>
                                                <path d="M3 14h7v7H3z"></path>
                                                <path d="M14 14h3v3h-3z"></path>
                                                <path d="M19 14h2v2h-2z"></path>
                                                <path d="M19 19h2v2h-2z"></path>
                                                <path d="M14 19h3v3h-3z"></path>
                                            </svg>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                            <h3 class="text-2xl md:text-3xl text-white mb-4 transition-colors duration-500 group-hover:text-primary" style="font-family: var(--font-display); font-weight: 400;">{{ $feature['title'] }}</h3>
                            <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">{{ $feature['description'] }}</p>
                            <div class="mt-8 w-16 h-px bg-primary/30 transition-all duration-700 group-hover:w-24 group-hover:bg-primary"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-24 md:mt-32 text-center reveal" data-reveal data-delay="700">
                <p class="text-white/70 mb-8 tracking-[0.15em] uppercase" style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 400;">Request Verification Documentation</p>
                <a href="{{ url('/contact') }}" class="group relative px-10 py-4 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]" style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 400;">
                    <span class="relative z-10">Contact Us</span>
                    <div class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="mb-20 md:mb-32 text-center reveal" data-reveal>
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">How It Works</span>
                    <div class="w-12 h-px bg-primary"></div>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">{{ $content['verification']['processTitle'] }}</h2>
                <p class="text-lg md:text-xl text-white/60 max-w-3xl mx-auto leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Four seamless steps to absolute certainty in authenticity and provenance</p>
            </div>

            @php
                $steps = [
                    ['title' => 'Scan QR Code', 'description' => 'Each piece features a unique QR code engraved directly into the metal surface.', 'details' => 'Our proprietary laser engraving ensures the QR code is permanent, tamper-proof, and perfectly scannable.', 'icon' => 'qr'],
                    ['title' => 'Secure Authentication', 'description' => 'Instant verification through our encrypted blockchain-backed database.', 'details' => 'Multi-layer security protocols ensure every scan is logged and verified against our master registry.', 'icon' => 'shield'],
                    ['title' => 'Certificate Access', 'description' => 'View complete documentation including purity analysis, origin, and chain of custody.', 'details' => 'Digital certificates include metallurgical reports, weight verification, and historical provenance data.', 'icon' => 'file-check'],
                    ['title' => 'Lifetime Guarantee', 'description' => 'Authenticated pieces carry our perpetual guarantee of authenticity and quality.', 'details' => 'Full buyback program and complimentary re-certification service for verified pieces.', 'icon' => 'award'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                @foreach ($steps as $index => $step)
                    <div class="reveal" data-reveal data-delay="{{ $index * 120 }}">
                        <div class="group relative border border-primary/20 transition-all duration-700 p-8 md:p-10 cursor-pointer" data-verify-step>
                            <div class="absolute top-6 right-6 text-6xl text-primary/10" style="font-family: var(--font-display); font-weight: 300;">0{{ $index + 1 }}</div>
                            <div class="mb-6 relative inline-block">
                                <div class="absolute inset-0 bg-primary/20 blur-xl transition-all duration-700 group-hover:bg-primary/40"></div>
                                <div class="relative w-16 h-16 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]">
                                    @switch($step['icon'])
                                        @case('qr')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M3 3h7v7H3z"></path>
                                                <path d="M14 3h7v7h-7z"></path>
                                                <path d="M3 14h7v7H3z"></path>
                                                <path d="M14 14h3v3h-3z"></path>
                                                <path d="M19 14h2v2h-2z"></path>
                                                <path d="M19 19h2v2h-2z"></path>
                                                <path d="M14 19h3v3h-3z"></path>
                                            </svg>
                                            @break
                                        @case('shield')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"></path>
                                                <path d="M9 12l2 2 4-4"></path>
                                            </svg>
                                            @break
                                        @case('file-check')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <path d="M14 2v6h6"></path>
                                                <path d="M9 14l2 2 4-4"></path>
                                            </svg>
                                            @break
                                        @case('award')
                                            <svg class="w-7 h-7 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M12 2a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"></path>
                                                <path d="M8 10l-2 10 6-3 6 3-2-10"></path>
                                            </svg>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                            <h3 class="text-2xl md:text-3xl mb-4 text-white group-hover:text-primary transition-colors duration-500" style="font-family: var(--font-display); font-weight: 400;">{{ $step['title'] }}</h3>
                            <p class="text-white/60 leading-relaxed mb-4" style="font-family: var(--font-body); font-weight: 300;">{{ $step['description'] }}</p>
                            <div class="overflow-hidden max-h-0 opacity-0 transition-all duration-500 border-t border-primary/20 group-hover:max-h-40 group-hover:opacity-100">
                                <div class="pt-4 mt-4">
                                    <p class="text-sm text-primary/80 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">{{ $step['details'] }}</p>
                                </div>
                            </div>
                            <div class="mt-6 h-px w-16 bg-primary/30 group-hover:w-full group-hover:bg-primary transition-all duration-700"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-20 md:mt-32 text-center reveal" data-reveal data-delay="700">
                <div class="inline-block border border-primary/20 p-12 md:p-16">
                    <div class="w-48 h-48 md:w-64 md:h-64 mx-auto mb-8 bg-white/5 border border-primary/30 flex items-center justify-center">
                        <span class="text-primary/40 text-6xl">QR</span>
                    </div>
                    <p class="text-white/50 text-sm tracking-[0.2em] uppercase" style="font-family: var(--font-body); font-weight: 300;">Sample QR Code</p>
                </div>
            </div>
        </div>
    </section>

    @include('marketing.partials.footer')
@endsection
