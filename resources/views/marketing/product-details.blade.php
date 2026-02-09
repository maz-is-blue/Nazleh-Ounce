@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-7xl mx-auto">
            <a href="{{ url('/collection') }}" class="flex items-center gap-2 text-foreground/60 hover:text-primary transition-colors duration-500 mb-12 group">
                <span class="text-sm tracking-wider">BACK TO COLLECTION</span>
            </a>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 mb-24">
                <div class="space-y-6 reveal" data-reveal>
                    <div class="aspect-square overflow-hidden border border-primary/20 bg-background/40">
                        <img src="{{ $product['images'][0] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-1000" />
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach (array_slice($product['images'], 1) as $image)
                            <div class="aspect-square overflow-hidden border border-primary/20 bg-background/40">
                                <img src="{{ $image }}" alt="{{ $product['name'] }} detail" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-8 reveal" data-reveal data-delay="150">
                    <div class="border-b border-primary/20 pb-8">
                        <h1 class="font-display text-5xl md:text-6xl text-primary mb-3">{{ $product['name'] }}</h1>
                        <p class="text-xl text-foreground/70 tracking-wide mb-6">{{ $product['subtitle'] }}</p>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl text-primary">{{ $product['price'] }}</span>
                            <span class="text-foreground/60">{{ $product['unit'] }}</span>
                        </div>
                    </div>

                    <div>
                        <p class="text-foreground/80 leading-relaxed mb-4">{{ $product['description'] }}</p>
                        <p class="text-foreground/60 leading-relaxed">{{ $product['long_description'] }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 py-6 border-y border-primary/20">
                        <div>
                            <p class="text-foreground/60 text-sm mb-1">PURITY</p>
                            <p class="text-primary tracking-wide">{{ $product['purity'] }}</p>
                        </div>
                        <div>
                            <p class="text-foreground/60 text-sm mb-1">STOCK</p>
                            <p class="text-primary tracking-wide">{{ $product['stock'] }} units</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-foreground/60 text-sm mb-1">AVAILABLE WEIGHTS</p>
                            <p class="text-foreground/80">{{ $product['weight'] }}</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-display text-xl text-primary mb-4">Key Features</h3>
                        <ul class="space-y-3">
                            @foreach ($product['features'] as $feature)
                                <li class="flex items-start gap-3 text-foreground/70">
                                    <span class="text-primary mt-1">•</span>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <button class="w-full bg-primary/10 border border-primary/40 py-4 px-8 hover:bg-primary/20 hover:border-primary/60 transition-all duration-700 text-primary tracking-widest relative overflow-hidden group">
                        <span class="relative z-10">ADD TO INQUIRY</span>
                        <span class="absolute inset-0 bg-primary/5 translate-y-full group-hover:translate-y-0 transition-transform duration-700"></span>
                    </button>
                </div>
            </div>

            <div class="border border-primary/20 bg-background/40 p-8 md:p-12 reveal" data-reveal data-delay="200">
                <h2 class="font-display text-3xl text-primary mb-8">Technical Specifications</h2>
                <div class="grid md:grid-cols-2 gap-x-12 gap-y-6">
                    @foreach ($product['specifications'] as $key => $value)
                        <div class="flex justify-between items-start border-b border-primary/10 pb-4">
                            <span class="text-foreground/60 tracking-wide">{{ $key }}</span>
                            <span class="text-foreground font-medium text-right">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('marketing.partials.footer')
@endsection
