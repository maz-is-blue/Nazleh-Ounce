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
                    @foreach ($content['about']['missionItems'] as $item)
                        <div class="border-l-2 border-primary/30 pl-6">
                            <h3 class="text-xl md:text-2xl mb-3 text-white" style="font-family: var(--font-display); font-weight: 300;">{{ $item['title'] }}</h3>
                            <p class="text-base md:text-lg text-white/70 leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
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
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">{{ $content['about']['philosophySection']['label'] }}</span>
                </div>
            </div>
            <div class="mb-20 md:mb-32 reveal" data-reveal data-delay="200">
                <h2 class="text-4xl md:text-5xl lg:text-6xl leading-tight text-white mb-8" style="font-family: var(--font-display); font-weight: 300;">
                    {{ $content['about']['philosophySection']['headline'] }}
                </h2>
                <p class="text-lg md:text-xl text-white/60 max-w-3xl leading-relaxed" style="font-family: var(--font-body); font-weight: 300;">
                    {{ $content['about']['philosophySection']['description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16">
                @foreach ($content['about']['philosophySection']['values'] as $index => $value)
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
                    <span class="text-sm tracking-[0.3em] uppercase text-primary" style="font-family: var(--font-body); font-weight: 400;">{{ $content['about']['timeline']['label'] }}</span>
                    <div class="w-12 h-px bg-primary"></div>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl text-white" style="font-family: var(--font-display); font-weight: 300;">{{ $content['about']['timeline']['title'] }}</h2>
            </div>

            <div class="relative">
                <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-primary/40 to-transparent hidden md:block"></div>
                <div class="space-y-24 md:space-y-32">
                    @foreach ($content['about']['timeline']['events'] as $index => $event)
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
