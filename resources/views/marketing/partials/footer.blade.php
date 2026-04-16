<footer class="relative py-20 md:py-24 px-6 md:px-12 border-t border-primary/10">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col items-center mb-12">
            <div class="mb-8 reveal-scale" data-reveal>
                <img src="{{ asset('images/nazleh/monogram-dark.png') }}" alt="Nazleh Ounce" class="w-16 h-16 md:w-20 md:h-20 object-contain opacity-80" />
            </div>
            <div class="text-center reveal-fade" data-reveal>
                <h3 class="text-2xl md:text-3xl mb-2" style="font-family: var(--font-display); font-weight: 300; letter-spacing: 0.2em; color: white;">
                    NAZLEH OUNCE
                </h3>
                <p class="text-sm tracking-[0.3em] uppercase text-white/50" style="font-family: var(--font-body); font-weight: 300;">
                    {{ $content['footer']['tagline'] }}
                </p>
            </div>
        </div>

        <div class="w-full h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent mb-12 reveal-line" data-reveal></div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-8 reveal-fade" data-reveal>
            <nav class="flex flex-wrap items-center justify-center gap-8 md:gap-12">
                <a href="{{ url('/') }}" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">Home</a>
                <a href="{{ url('/about') }}" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">About</a>
                <a href="{{ url('/collection') }}" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">Collection</a>
                <a href="{{ url('/verification') }}" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">Verification</a>
                <a href="{{ url('/contact') }}" class="text-sm tracking-[0.2em] uppercase text-white/50 transition-colors duration-500 hover:text-primary" style="font-family: var(--font-body); font-weight: 400;">Contact</a>
            </nav>
            <div class="text-sm text-white/30 text-center md:text-right" style="font-family: var(--font-body); font-weight: 300;">
                <div>{{ $content['footer']['copyright'] }}</div>
                <div class="text-xs text-white/30 mt-2">Data source: GoldPriceZ.com</div>
            </div>
        </div>

        <div class="mt-12 flex justify-center reveal-fade" data-reveal>
            <div class="w-1 h-1 rounded-full bg-primary/50"></div>
        </div>
    </div>
</footer>
