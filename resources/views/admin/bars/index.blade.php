@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-[1600px] mx-auto">
            <div class="mb-10 reveal" data-reveal>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h1 class="font-display text-4xl md:text-5xl text-primary mb-2">Admin - Bars</h1>
                        <p class="text-foreground/60 tracking-wider">Manage inventory, assignments, and QR ownership.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary tracking-wider">Dashboard</a>

                    </div>
                </div>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 bg-primary/10 border border-primary/30 text-primary text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-200 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 mb-8 reveal" data-reveal>
                <form method="get" action="{{ route('admin.bars.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <input type="text" name="public_id" placeholder="Public ID" value="{{ $filters['public_id'] ?? '' }}" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    <select name="status" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground">
                        <option value="">Any status</option>
                        <option value="unsold" @selected(($filters['status'] ?? '') === 'unsold')>Unsold</option>
                        <option value="sold" @selected(($filters['status'] ?? '') === 'sold')>Sold</option>
                    </select>
                    <button type="submit" class="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">Search</button>
                </form>
            </div>

            @if ($showSeedPool)
            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 mb-8 reveal" data-reveal data-delay="60">
                <h3 class="font-display text-xl text-primary mb-2">Seed Existing QR Pool</h3>
                <p class="text-sm text-foreground/60 mb-4">Create placeholder bars for already-generated QRs (e.g. H000666-H000865).</p>
                <form method="post" action="{{ route('admin.bars.seedPool') }}" class="grid grid-cols-1 md:grid-cols-6 gap-4">
                    @csrf
                    <input type="text" name="prefix" value="H" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    <input type="number" name="start" value="666" min="1" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    <input type="number" name="count" value="200" min="1" max="5000" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    <select name="metal_type" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground">
                        <option value="silver">Silver</option>
                        <option value="gold">Gold</option>
                    </select>
                    <input type="text" name="weight" value="1000.000" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    <input type="text" name="purity" placeholder="Purity (optional)" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    <button type="submit" class="md:col-span-6 px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">Seed Pool</button>
                </form>
            </div>
            @endif

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 mb-8 reveal" data-reveal data-delay="80">
                <h3 class="font-display text-xl text-primary mb-2">Assign & Create Bars</h3>
                <p class="text-sm text-foreground/60 mb-4">Choose existing QR or create a new QR. Silver defaults to the H series. Gold uses its own series.</p>
                <form method="post" action="{{ route('admin.bars.assignFlow') }}" id="bar-assignment-form" class="grid grid-cols-1 gap-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <input type="text" name="buyer_name" placeholder="Buyer name" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        <input type="email" name="buyer_email" placeholder="Buyer email" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        <input type="text" name="buyer_phone" placeholder="Buyer phone" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        <input type="text" name="buyer_location" placeholder="Buyer location" required class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                    </div>

                    <div id="bar-rows" class="space-y-4" data-existing='@json($existingNumbers)' data-new='@json($newNumbers)' data-prefixes='@json($defaultPrefixes)'>
                        <div class="bar-row border border-primary/10 bg-background/30 p-4">
                            <div class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">
                                <div>
                                    <label class="block text-xs text-foreground/60 mb-2">MODE</label>
                                    <select name="bars[0][mode]" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground">
                                        <option value="existing">Assign Existing QR</option>
                                        <option value="new">Create New QR</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs text-foreground/60 mb-2">METAL</label>
                                    <select name="bars[0][metal_type]" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground">
                                        <option value="silver">Silver (H)</option>
                                        <option value="gold">Gold</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs text-foreground/60 mb-2">WEIGHT (g)</label>
                                    <input type="text" name="bars[0][weight]" placeholder="100.000" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                                </div>
                                <div>
                                    <label class="block text-xs text-foreground/60 mb-2">PURITY</label>
                                    <input type="text" name="bars[0][purity]" placeholder="Purity (optional)" class="bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                                </div>
                                <div>
                                    <label class="block text-xs text-foreground/60 mb-2 serial-label">Assigned serial</label>
                                    <div class="serial-preview text-primary text-sm tracking-wider">—</div>
                                </div>
                                <div class="flex items-end">
                                    <button type="button" class="remove-row px-4 py-3 border border-primary/30 text-primary/70 hover:text-primary hover:border-primary/60 transition-all duration-300 hidden">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <button type="button" id="add-bar-row" class="px-6 py-3 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary tracking-wider">Add another bar</button>
                        <button type="submit" class="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">Save Assignment</button>
                    </div>
                </form>
            </div>

                        <script>
                (() => {
                    const container = document.getElementById('bar-rows');
                    if (!container) return;

                    const addButton = document.getElementById('add-bar-row');
                    const existingBase = JSON.parse(container.dataset.existing || '{}');
                    const newBase = JSON.parse(container.dataset.new || '{}');
                    const prefixes = JSON.parse(container.dataset.prefixes || '{}');

                    const formatSerial = (prefix, number) => {
                        const padded = String(number).padStart(6, '0');
                        return `${prefix}${padded}`;
                    };

                    const reindexRows = () => {
                        const rows = Array.from(container.querySelectorAll('.bar-row'));
                        rows.forEach((row, index) => {
                            row.querySelectorAll('select, input').forEach((input) => {
                                if (!input.name) return;
                                input.name = input.name.replace(/bars\[\d+\]/, `bars[${index}]`);
                            });
                        });
                    };

                    const updatePreviews = () => {
                        const rows = Array.from(container.querySelectorAll('.bar-row'));
                        const counters = {};

                        rows.forEach((row) => {
                            const mode = row.querySelector('select[name*="[mode]"]').value;
                            const metal = row.querySelector('select[name*="[metal_type]"]').value;
                            const prefix = prefixes[metal] || (metal === 'silver' ? 'H' : 'G');
                            const key = `${mode}|${prefix}`;
                            const base = mode === 'existing' ? existingBase[prefix] : newBase[prefix];

                            counters[key] = (counters[key] || 0) + 1;
                            const number = base !== undefined && base !== null ? base + counters[key] - 1 : null;

                            const label = row.querySelector('.serial-label');
                            const preview = row.querySelector('.serial-preview');
                            if (label) label.textContent = mode === 'existing' ? 'Assigned serial' : 'New serial';
                            if (preview) preview.textContent = number ? formatSerial(prefix, number) : 'None available';
                        });
                    };

                    addButton?.addEventListener('click', () => {
                        const rows = Array.from(container.querySelectorAll('.bar-row'));
                        const template = rows[0];
                        if (!template) return;

                        const clone = template.cloneNode(true);
                        clone.querySelectorAll('input').forEach((input) => {
                            input.value = '';
                        });
                        const removeButton = clone.querySelector('.remove-row');
                        if (removeButton) {
                            removeButton.classList.remove('hidden');
                        }

                        container.appendChild(clone);
                        reindexRows();
                        updatePreviews();
                    });

                    container.addEventListener('click', (event) => {
                        const target = event.target;
                        if (!(target instanceof HTMLElement)) return;
                        if (!target.classList.contains('remove-row')) return;

                        const row = target.closest('.bar-row');
                        if (!row) return;
                        row.remove();
                        reindexRows();
                        updatePreviews();
                    });

                    container.addEventListener('change', (event) => {
                        const target = event.target;
                        if (!(target instanceof HTMLElement)) return;
                        if (!target.matches('select')) return;
                        updatePreviews();
                    });

                    updatePreviews();
                })();
            </script>

            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden reveal" data-reveal data-delay="200">
                <table class="w-full">
                    <thead class="bg-primary/5 border-b border-primary/20">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">LABEL</th>
                            <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">PUBLIC ID</th>
                            <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">METAL</th>
                            <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">WEIGHT</th>
                            <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">STATUS</th>
                            <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">OWNER</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bars as $bar)
                            <tr class="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                                <td class="px-6 py-4 text-foreground/70">{{ $bar->human_code ?? '—' }}</td>
                                <td class="px-6 py-4 font-mono text-sm text-primary">{{ $bar->public_id }}</td>
                                <td class="px-6 py-4 text-foreground/70">{{ ucfirst($bar->metal_type) }}</td>
                                <td class="px-6 py-4 text-foreground/70">{{ $bar->weight }}</td>
                                <td class="px-6 py-4 text-foreground/70">{{ ucfirst($bar->status) }}</td>
                                <td class="px-6 py-4 text-foreground/70">{{ $bar->owner?->name ?? 'Not assigned' }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $bars->links() }}
            </div>
        </div>
    </div>
@endsection













