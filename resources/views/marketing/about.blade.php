@extends('layouts.marketing')

@section('content')
    <div class="pt-32 md:pt-40"></div>

    <section class="relative py-20 md:py-24 px-6 md:px-12">
        <div class="max-w-5xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl lg:text-7xl mb-6 tracking-[0.15em] uppercase text-white reveal" data-reveal style="font-family: var(--font-display); font-weight: 300; letter-spacing: 0.2em;">
                {{ $content['about']['title'] }}
            </h1>
            <div class="w-24 h-px bg-primary mx-auto mb-12 reveal-line" data-reveal data-delay="200"></div>
            <p class="text-xl md:text-2xl text-white/70 leading-relaxed max-w-3xl mx-auto reveal" data-reveal data-delay="300" style="font-family: var(--font-body); font-weight: 300;">
                {{ $content['about']['description'] }}
            </p>
        </div>
    </section>

    <section class="relative py-20 md:py-32 px-6 md:px-12">
        <div class="max-w-4xl mx-auto">
            <div class="mb-16 reveal" data-reveal>
                <h2 class="text-3xl md:text-4xl mb-8 tracking-[0.15em] uppercase text-primary" style="font-family: var(--font-display); font-weight: 300; letter-spacing: 0.2em;">
                    {{ $content['about']['subtitle'] }}
                </h2>
                <div class="space-y-6 text-lg md:text-xl text-white/70 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                    <p>{{ $content['about']['description'] }}</p>
                    <p>{{ $content['about']['missionText'] }}</p>
                </div>
            </div>

            <div class="reveal" data-reveal data-delay="200">
                <h2 class="text-3xl md:text-4xl mb-8 tracking-[0.15em] uppercase text-primary" style="font-family: var(--font-display); font-weight: 300; letter-spacing: 0.2em;">
                    {{ $content['about']['missionTitle'] }}
                </h2>
                <div class="space-y-8">
                    <div class="border-l-2 border-primary/30 pl-6">
                        <h3 class="text-xl md:text-2xl mb-3 text-white" style="font-family: var(--font-display); font-weight: 300;">Certified Precious Metal Alloys</h3>
                        <p class="text-base md:text-lg text-white/70 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Each bar and bullion piece is meticulously crafted from the finest gold and silver alloys, meeting international purity standards. Our collection ranges from classic 24K gold to sophisticated silver compositions, each authenticated and documented.</p>
                    </div>
                    <div class="border-l-2 border-primary/30 pl-6">
                        <h3 class="text-xl md:text-2xl mb-3 text-white" style="font-family: var(--font-display); font-weight: 300;">Advanced QR Verification System</h3>
                        <p class="text-base md:text-lg text-white/70 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Every piece features our proprietary QR verification technology, providing instant access to complete provenance, certification details, and authenticity documentation. This system ensures absolute transparency and peace of mind.</p>
                    </div>
                    <div class="border-l-2 border-primary/30 pl-6">
                        <h3 class="text-xl md:text-2xl mb-3 text-white" style="font-family: var(--font-display); font-weight: 300;">White Glove Service</h3>
                        <p class="text-base md:text-lg text-white/70 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">From private consultations to secure delivery, we provide a seamless experience for collectors and institutions. Our team offers expert guidance on portfolio diversification, market insights, and long-term wealth preservation strategies.</p>
                    </div>
                    <div class="border-l-2 border-primary/30 pl-6">
                        <h3 class="text-xl md:text-2xl mb-3 text-white" style="font-family: var(--font-display); font-weight: 300;">Legacy Investments</h3>
                        <p class="text-base md:text-lg text-white/70 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">Beyond transactions, we facilitate generational wealth transfer and long-term value preservation. Our precious metals are designed to be heirlooms, investments that transcend time and economic cycles.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent opacity-30"></div>
        <div class="relative z-10 max-w-6xl mx-auto">
            <div class="mb-16 md:mb-24 reveal" data-reveal>
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">Philosophy</span>
                </div>
            </div>
            <div class="mb-20 md:mb-32 reveal" data-reveal data-delay="200">
                <h2 class="text-4xl md:text-5xl lg:text-6xl leading-tight text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">
                    Every bar tells a story<br />of precision and permanence
                </h2>
                <p class="text-lg md:text-xl text-white/60 max-w-3xl leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                    We craft gold and silver alloys with an unwavering commitment to purity, authenticity, and long-term value. Each piece is handcrafted to meet the highest standards of excellence.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">
                @php
                    $values = [
                        ['title' => 'Craftsmanship', 'description' => 'Meticulous attention to every detail, ensuring each alloy meets exacting specifications.'],
                        ['title' => 'Purity', 'description' => 'Only the finest materials, refined to investment-grade standards.'],
                        ['title' => 'Trust', 'description' => 'Complete transparency and verification for every piece we create.'],
                    ];
                @endphp
                @foreach ($values as $index => $value)
                    <div class="reveal" data-reveal data-delay="{{ 200 + $index * 120 }}">
                        <div class="group">
                            <div class="w-16 h-px bg-primary/30 mb-8 transition-all duration-700 group-hover:w-24 group-hover:bg-primary group-hover:shadow-[0_0_20px_rgba(139,212,226,0.5)]"></div>
                            <h3 class="text-2xl md:text-3xl mb-4 text-white" style="font-family: var(--font-display); font-weight: 400;">{{ $value['title'] }}</h3>
                            <p class="text-white/50 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">{{ $value['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="absolute inset-0 flex items-center justify-center opacity-[0.02]">
            <div class="text-[20rem] md:text-[30rem] font-serif text-primary select-none">"</div>
        </div>
        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-primary to-transparent mx-auto mb-16 reveal-line" data-reveal></div>
            <blockquote class="space-y-8 md:space-y-12 reveal" data-reveal data-delay="200">
                <p class="text-2xl md:text-3xl lg:text-4xl leading-relaxed text-white/90 mb-8 max-w-4xl mx-auto" style="font-family: var(--font-display); font-weight: 300;">
                    "{{ $content['philosophy']['quote'] }}"
                </p>
                <footer>
                    <cite class="text-sm tracking-[0.25em] uppercase text-primary not-italic" style="font-family: var(--font-body); font-weight: 300;">{{ $content['philosophy']['author'] }}</cite>
                </footer>
            </blockquote>
            <div class="w-32 h-px bg-gradient-to-r from-transparent via-primary to-transparent mx-auto mt-16 reveal-line" data-reveal data-delay="400"></div>
        </div>
    </section>

    <section class="relative py-32 md:py-48 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="mb-20 md:mb-32 text-center reveal" data-reveal>
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="w-12 h-px bg-primary"></div>
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">Our Journey</span>
                    <div class="w-12 h-px bg-primary"></div>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl text-white" style="font-family: var(--font-display); font-weight: 300;">Milestones of Excellence</h2>
            </div>

            <div class="relative">
                <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-primary/40 to-transparent hidden md:block"></div>
                <div class="space-y-24 md:space-y-32">
                    @php
                        $events = [
                            ['year' => '2018', 'title' => 'Foundation', 'description' => 'NAZLEH OUNCE was founded with a vision to revolutionize precious metal authentication and trading standards.'],
                            ['year' => '2019', 'title' => 'QR Verification System', 'description' => 'Launched our proprietary QR verification technology, ensuring complete traceability and transparency.'],
                            ['year' => '2021', 'title' => 'International Expansion', 'description' => 'Expanded operations to serve collectors and institutions across the Middle East and Europe.'],
                            ['year' => '2023', 'title' => 'Certification Excellence', 'description' => 'Achieved highest industry certifications for purity standards and sustainable sourcing practices.'],
                            ['year' => '2026', 'title' => 'Future of Authenticity', 'description' => 'Leading the industry in blockchain integration and advanced metallurgical verification methods.'],
                        ];
                    @endphp
                    @foreach ($events as $index => $event)
                        <div class="relative flex flex-col md:flex-row {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-center gap-8 md:gap-16 reveal" data-reveal data-delay="{{ $index * 120 }}">
                            <div class="flex-1 {{ $index % 2 === 0 ? 'md:text-right' : 'md:text-left' }} text-left">
                                <div class="inline-block">
                                    <div class="text-6xl md:text-7xl text-primary/30 mb-4" style="font-family: var(--font-display); font-weight: 300;">{{ $event['year'] }}</div>
                                    <h3 class="text-2xl md:text-3xl text-white mb-4" style="font-family: var(--font-display); font-weight: 400;">{{ $event['title'] }}</h3>
                                    <p class="text-white/60 leading-relaxed max-w-md" style="font-family: var(--font-body); font-weight: 300;">{{ $event['description'] }}</p>
                                </div>
                            </div>
                            <div class="relative z-10 flex-shrink-0">
                                <div class="w-4 h-4 rounded-full bg-primary shadow-[0_0_20px_rgba(139,212,226,0.6)]">
                                    <div class="absolute inset-0 rounded-full bg-primary animate-ping opacity-40"></div>
                                </div>
                            </div>
                            <div class="flex-1 hidden md:block"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('marketing.partials.footer')
@endsection
