@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <h1 class="font-display text-4xl text-primary">Create Bar</h1>
                <p class="text-foreground/60">Add a single bar to inventory.</p>
            </div>

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8">
                <form method="post" action="{{ route('admin.bars.store') }}" class="grid grid-cols-1 gap-6">
                    @csrf
                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">METAL TYPE</label>
                        <select name="metal_type" required class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground">
                            <option value="gold">Gold</option>
                            <option value="silver">Silver</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">WEIGHT (g)</label>
                        <input type="text" name="weight" placeholder="100.000" value="100.000" required class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    </div>
                    <div>
                        <label class="block text-sm mb-2 tracking-wide text-foreground/80">PURITY</label>
                        <input type="text" name="purity" placeholder="Purity (optional)" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="submit" class="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">
                            Create Bar
                        </button>
                        <a href="{{ route('admin.bars.index') }}" class="px-6 py-3 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary tracking-wider">
                            Back to Bars
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
