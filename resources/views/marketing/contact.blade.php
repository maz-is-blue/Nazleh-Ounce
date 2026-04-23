@extends('layouts.marketing')

@section('content')
    <section id="contact" class="relative py-32 md:py-40 px-6 md:px-12 pt-40">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-20 md:mb-24 reveal" data-reveal>
            <h2 class="text-4xl md:text-5xl lg:text-6xl mb-6 tracking-[0.15em] uppercase text-white" style="font-family: var(--font-display); font-weight: 300; letter-spacing: 0.2em;">{{ $content['contact']['title'] }}</h2>
                <div class="w-24 h-px bg-primary mx-auto mb-8 reveal-line" data-reveal data-delay="200"></div>
            <p class="text-lg md:text-xl text-white/60 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['subtitle'] }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <a href="mailto:{{ $content['contact']['email'] }}" class="block reveal" data-reveal data-delay="100">
                    <div class="group relative">
                        <div class="relative border border-primary/20 p-8 md:p-10 transition-all duration-700 hover:border-primary/40 hover:shadow-[0_0_40px_rgba(139,212,226,0.15)]">
                            <div class="mb-6 flex justify-center">
                                <div class="w-12 h-12 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]">
                                    <svg class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-sm tracking-[0.25em] uppercase text-primary mb-4 text-center" style="font-family: var(--font-body); font-weight: 400;">Email</h3>
                            <p class="text-base md:text-lg text-white/80 text-center transition-colors duration-500 group-hover:text-white" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['email'] }}</p>
                            <div class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5 pointer-events-none"></div>
                        </div>
                    </div>
                </a>
                <a href="tel:{{ preg_replace('/\\D+/', '', $content['contact']['phone']) }}" class="block reveal" data-reveal data-delay="220">
                    <div class="group relative">
                        <div class="relative border border-primary/20 p-8 md:p-10 transition-all duration-700 hover:border-primary/40 hover:shadow-[0_0_40px_rgba(139,212,226,0.15)]">
                            <div class="mb-6 flex justify-center">
                                <div class="w-12 h-12 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]">
                                    <svg class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-sm tracking-[0.25em] uppercase text-primary mb-4 text-center" style="font-family: var(--font-body); font-weight: 400;">Phone</h3>
                            <p class="text-base md:text-lg text-white/80 text-center transition-colors duration-500 group-hover:text-white" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['phone'] }}</p>
                            <div class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5 pointer-events-none"></div>
                        </div>
                    </div>
                </a>
                <div class="reveal" data-reveal data-delay="340">
                    <div class="group relative">
                        <div class="relative border border-primary/20 p-8 md:p-10 transition-all duration-700 hover:border-primary/40 hover:shadow-[0_0_40px_rgba(139,212,226,0.15)]">
                            <div class="mb-6 flex justify-center">
                                <div class="w-12 h-12 flex items-center justify-center border border-primary/30 transition-all duration-700 group-hover:border-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.3)]">
                                    <svg class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-sm tracking-[0.25em] uppercase text-primary mb-4 text-center" style="font-family: var(--font-body); font-weight: 400;">Location</h3>
                            <p class="text-base md:text-lg text-white/80 text-center transition-colors duration-500 group-hover:text-white" style="font-family: var(--font-body); font-weight: 300;">{{ $content['contact']['address'] }}</p>
                            <div class="absolute inset-0 bg-primary/0 transition-all duration-700 group-hover:bg-primary/5 pointer-events-none"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-20 md:mt-24 text-center reveal" data-reveal data-delay="500">
                <p class="text-base text-white/50 italic max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-display); font-weight: 300;">
                    "We welcome discerning collectors and institutions seeking authenticated precious metal investments of the highest caliber."
                </p>
            </div>

            <div class="mt-16 flex justify-center reveal-fade" data-reveal data-delay="650">
                <div class="w-1 h-1 rounded-full bg-primary/50"></div>
            </div>
        </div>
    </section>

    <section class="relative h-[60vh] md:h-[70vh] overflow-hidden">
        <div class="absolute inset-0">
            <div class="w-full h-full">
                <img src="https://images.unsplash.com/photo-1522255272218-7ac5249be344?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBiYW5raW5nJTIwcHJpdmF0ZSUyMHdlYWx0aHxlbnwxfHx8fDE3NzAwMjQ2Mzd8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" alt="Luxury ambient background" class="w-full h-full object-cover" />
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/80 to-background/40"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-background/60 via-transparent to-background/60"></div>

            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center px-6 reveal" data-reveal>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl text-white mb-6" style="font-family: var(--font-display); font-weight: 300;">Private Consultations</h2>
                    <p class="text-lg md:text-xl text-white/70 max-w-2xl mx-auto leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Schedule a personalized consultation with our precious metals experts</p>
                </div>
            </div>
        </div>
    </section>

    @include('marketing.partials.footer')
@endsection
