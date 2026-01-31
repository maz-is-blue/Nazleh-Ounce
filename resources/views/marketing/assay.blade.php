@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen bg-background overflow-x-hidden" style="font-family: var(--font-body);">
        <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-700">
            <div id="site-nav" class="transition-all duration-700">
                <div class="max-w-[1600px] mx-auto px-6 md:px-12 py-6 flex items-center justify-between">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                        <span class="text-xl tracking-[0.2em] uppercase text-white transition-colors duration-500 group-hover:text-primary"
                              style="font-family: var(--font-display); font-weight: 400;">
                            NAZLEH
                        </span>
                    </a>
                    <div class="hidden md:flex items-center gap-10">
                        <a href="{{ url('/') }}#verification" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group">
                            Verification
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('marketing.heritage') }}" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group">
                            Heritage
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                    </div>
                    <div class="w-8 h-px bg-primary/30 hidden lg:block"></div>
                </div>
            </div>
        </nav>

        <section class="relative pt-40 pb-24 px-6 md:px-12">
            <div class="max-w-5xl mx-auto text-center">
                <p class="text-sm tracking-[0.4em] uppercase text-primary reveal">Assay & Verification</p>
                <h1 class="mt-6 text-4xl md:text-6xl text-white reveal" style="font-family: var(--font-display); font-weight: 300;">
                    Transparent verification at every stage
                </h1>
                <p class="mt-8 text-white/60 text-lg reveal">
                    Our verification program combines physical inspection, digital traceability, and secure QR-based records.
                </p>
            </div>
        </section>

        <section class="px-6 md:px-12 pb-24">
            <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-10">
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Batch Assay</h3>
                    <p class="text-white/60 leading-relaxed">
                        Each production batch is tested for purity with calibrated instruments and logged against the issuance record.
                    </p>
                </div>
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Serial Linking</h3>
                    <p class="text-white/60 leading-relaxed">
                        Serial labels map back to a unique public ID, ensuring verifiable provenance when scanned.
                    </p>
                </div>
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Secure Registry</h3>
                    <p class="text-white/60 leading-relaxed">
                        Ownership updates are logged with audit trails to maintain an immutable verification history.
                    </p>
                </div>
            </div>
        </section>

        <section class="px-6 md:px-12 pb-32">
            <div class="max-w-6xl mx-auto section-card p-10 reveal">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h3 class="text-3xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">Scan to verify</h3>
                        <p class="text-white/60 leading-relaxed">
                            The QR entrypoint redirects to the public registry, showing the bar’s ID and owner assignment status.
                        </p>
                        <div class="mt-8">
                            <a href="{{ url('/') }}#verification"
                               class="group relative px-8 py-3 border border-primary/30 text-white tracking-[0.2em] uppercase transition-all duration-700 hover:border-primary hover:shadow-[0_0_30px_rgba(139,212,226,0.3)]"
                               style="font-family: var(--font-body); font-size: 0.75rem; font-weight: 400;">
                                <span class="relative z-10">See Verification</span>
                                <span class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5"></span>
                            </a>
                        </div>
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80" alt="Verification" class="w-full h-64 object-cover rounded">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
