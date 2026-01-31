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
                        <a href="{{ url('/') }}#about" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group">
                            About
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="{{ url('/') }}#collection" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group">
                            Collection
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('marketing.assay') }}" class="relative text-sm tracking-[0.2em] uppercase text-white/70 transition-colors duration-500 hover:text-primary group">
                            Assay
                            <span class="absolute -bottom-1 left-0 w-0 h-px bg-primary transition-all duration-500 group-hover:w-full"></span>
                        </a>
                    </div>
                    <div class="w-8 h-px bg-primary/30 hidden lg:block"></div>
                </div>
            </div>
        </nav>

        <section class="relative pt-40 pb-24 px-6 md:px-12">
            <div class="max-w-5xl mx-auto text-center">
                <p class="text-sm tracking-[0.4em] uppercase text-primary reveal">Heritage</p>
                <h1 class="mt-6 text-4xl md:text-6xl text-white reveal" style="font-family: var(--font-display); font-weight: 300;">
                    A legacy of precision, from furnace to finish
                </h1>
                <p class="mt-8 text-white/60 text-lg reveal">
                    Our atelier blends traditional metalwork with modern assay standards to deliver bars that stand the test of time.
                </p>
            </div>
        </section>

        <section class="px-6 md:px-12 pb-24">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Origins</h3>
                    <p class="text-white/60 leading-relaxed">
                        Every bar begins with responsibly sourced precious metals, selected for purity and consistency.
                    </p>
                </div>
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Artisan Forming</h3>
                    <p class="text-white/60 leading-relaxed">
                        Molten metal is poured into precision molds, cooled slowly, and finished by hand to preserve its character.
                    </p>
                </div>
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Serial Integrity</h3>
                    <p class="text-white/60 leading-relaxed">
                        Each bar receives a unique serial label tied to its verification record and QC pass.
                    </p>
                </div>
                <div class="section-card p-10 reveal">
                    <h3 class="text-2xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">Presentation</h3>
                    <p class="text-white/60 leading-relaxed">
                        Final inspection ensures every surface, edge, and stamp meets our investment-grade standards.
                    </p>
                </div>
            </div>
        </section>

        <section class="px-6 md:px-12 pb-32">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row gap-10 items-center section-card p-10 reveal">
                    <div class="w-full md:w-1/2">
                        <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80" alt="Crafting" class="w-full h-72 object-cover rounded">
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl text-white mb-4" style="font-family: var(--font-display); font-weight: 300;">Museum-grade finishing</h3>
                        <p class="text-white/60 leading-relaxed">
                            Our finishing protocol matches the standards of heritage mints: meticulous polish, clean edges, and discreet hallmarks.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
