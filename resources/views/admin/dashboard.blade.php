@extends('layouts.marketing')

@section('content')
    <div class="min-h-screen px-6 py-32">
        <div class="max-w-[1600px] mx-auto">
            <div class="mb-12 reveal" data-reveal>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="size-8 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 2l7 4v6c0 5-3.5 9-7 10-3.5-1-7-5-7-10V6l7-4z"></path>
                                <path d="M9 12l2 2 4-4"></path>
                            </svg>
                            <h1 class="font-display text-4xl md:text-5xl text-primary">Admin Dashboard</h1>
                        </div>
                        <p class="text-foreground/60 tracking-wider">Secure control center for Nazleh Ounce operations.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.bars.index') }}" class="px-6 py-3 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary tracking-wider">
                            Manage Bars
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-6 py-3 border border-primary/30 hover:border-primary/60 hover:bg-primary/10 transition-all duration-500 text-primary tracking-wider">
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 bg-primary/10 border border-primary/30 text-primary text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-8 border-b border-primary/20 reveal" data-reveal data-delay="120">
                <div class="flex gap-2 overflow-x-auto">
                    @php
                        $tabs = [
                            ['id' => 'overview', 'label' => 'Overview'],
                            ['id' => 'users', 'label' => 'Users'],
                            ['id' => 'purchases', 'label' => 'Purchases'],
                            ['id' => 'verifications', 'label' => 'Verifications'],
                            ['id' => 'content', 'label' => 'Content'],
                            ['id' => 'media', 'label' => 'Media'],
                            ['id' => 'products', 'label' => 'Products'],
                        ];
                    @endphp
                    @foreach ($tabs as $tab)
                        <button data-admin-tab="{{ $tab['id'] }}" class="flex items-center gap-2 px-6 py-4 border-b-2 border-transparent text-foreground/60 hover:text-foreground/80 transition-all duration-500 whitespace-nowrap">
                            <span class="tracking-wider text-sm">{{ $tab['label'] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            <div data-admin-panel="overview">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 reveal" data-reveal>
                        <p class="text-3xl font-display mb-2 text-primary">{{ $stats['total_users'] }}</p>
                        <p class="text-sm text-foreground/60 tracking-wider">Total Users</p>
                    </div>
                    <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 reveal" data-reveal data-delay="120">
                        <p class="text-3xl font-display mb-2 text-primary">{{ $stats['total_bars'] }}</p>
                        <p class="text-sm text-foreground/60 tracking-wider">Total Bars</p>
                    </div>
                    <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 reveal" data-reveal data-delay="240">
                        <p class="text-3xl font-display mb-2 text-primary">{{ $stats['sold_bars'] }}</p>
                        <p class="text-sm text-foreground/60 tracking-wider">Sold Bars</p>
                    </div>
                    <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 reveal" data-reveal data-delay="360">
                        <p class="text-3xl font-display mb-2 text-primary">{{ $stats['ownership_events'] }}</p>
                        <p class="text-sm text-foreground/60 tracking-wider">Ownership Events</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                    <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 reveal" data-reveal>
                        <h3 class="font-display text-xl mb-4 text-primary">Recent Users</h3>
                        <div class="space-y-3">
                            @foreach ($recentUsers as $user)
                                <div class="flex items-center justify-between py-3 border-b border-primary/10 last:border-0">
                                    <div>
                                        <p class="text-foreground/80">{{ $user->name }}</p>
                                        <p class="text-xs text-foreground/40">{{ $user->email }}</p>
                                    </div>
                                    <span class="text-xs text-foreground/50">{{ $user->created_at->format('M j, Y') }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6 reveal" data-reveal data-delay="200">
                        <h3 class="font-display text-xl mb-4 text-primary">Recent Assignments</h3>
                        <div class="space-y-3">
                            @forelse ($recentAssignments as $event)
                                <div class="flex items-center justify-between py-3 border-b border-primary/10 last:border-0">
                                    <div>
                                        <p class="text-foreground/80">{{ $event->bar?->public_id ?? 'Bar' }}</p>
                                        <p class="text-xs text-foreground/40">{{ $event->toUser?->name ?? 'Unknown' }}</p>
                                    </div>
                                    <span class="text-xs text-foreground/50">{{ $event->created_at->format('M j, Y') }}</span>
                                </div>
                            @empty
                                <p class="text-foreground/50 text-sm">No assignments yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div data-admin-panel="users" class="hidden">
                <div class="mb-6 flex items-center gap-4">
                    <div class="flex-1 relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">🔍</span>
                        <input type="text" placeholder="Search users..." class="w-full bg-background/60 border border-primary/30 px-12 py-3 text-foreground" />
                    </div>
                    <button class="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">
                        Add User
                    </button>
                </div>
                <div class="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-primary/5 border-b border-primary/20">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">NAME</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">EMAIL</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">JOINED</th>
                                <th class="px-6 py-4 text-right text-sm tracking-wider text-foreground/80">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUsers as $user)
                                <tr class="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                                    <td class="px-6 py-4 text-foreground/80">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ $user->created_at->format('M j, Y') }}</td>
                                    <td class="px-6 py-4 text-right text-sm text-primary">View</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div data-admin-panel="purchases" class="hidden">
                <div class="mb-6 relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">🔍</span>
                    <input type="text" placeholder="Search purchases..." class="w-full bg-background/60 border border-primary/30 px-12 py-3 text-foreground" />
                </div>
                <div class="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-primary/5 border-b border-primary/20">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">USER</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">ALLOY</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">WEIGHT</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">DATE</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentPurchases as $bar)
                                <tr class="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                                    <td class="px-6 py-4 text-foreground/80">{{ $bar->owner?->name ?? 'Unassigned' }}</td>
                                    <td class="px-6 py-4 text-foreground/80">{{ ucfirst($bar->metal_type) }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ $bar->weight }} g</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ optional($bar->sold_at)->format('M j, Y') ?? '—' }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ ucfirst($bar->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div data-admin-panel="verifications" class="hidden">
                <div class="mb-6 relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-primary/50">🔍</span>
                    <input type="text" placeholder="Search verifications..." class="w-full bg-background/60 border border-primary/30 px-12 py-3 text-foreground" />
                </div>
                <div class="backdrop-blur-sm bg-background/40 border border-primary/20 overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-primary/5 border-b border-primary/20">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">SERIAL</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">ALLOY</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">OWNER</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">UPDATED</th>
                                <th class="px-6 py-4 text-left text-sm tracking-wider text-foreground/80">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentVerifications as $bar)
                                <tr class="border-b border-primary/10 hover:bg-primary/5 transition-colors duration-300">
                                    <td class="px-6 py-4 font-mono text-sm text-primary">{{ $bar->public_id }}</td>
                                    <td class="px-6 py-4 text-foreground/80">{{ ucfirst($bar->metal_type) }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ $bar->owner?->email ?? 'Unassigned' }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ $bar->updated_at->format('M j, Y') }}</td>
                                    <td class="px-6 py-4 text-foreground/60 text-sm">{{ ucfirst($bar->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div data-admin-panel="content" class="hidden">
                <form method="post" action="{{ route('admin.content.update') }}" class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8 space-y-8">
                    @csrf
                    <h3 class="font-display text-xl text-primary">Content Management</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Hero Title</label>
                            <input type="text" name="content[hero][title]" value="{{ $content['hero']['title'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Hero Subtitle</label>
                            <input type="text" name="content[hero][subtitle]" value="{{ $content['hero']['subtitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Hero Description</label>
                            <textarea rows="3" name="content[hero][description]" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground resize-none">{{ $content['hero']['description'] }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">About Title</label>
                            <input type="text" name="content[about][title]" value="{{ $content['about']['title'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">About Subtitle</label>
                            <input type="text" name="content[about][subtitle]" value="{{ $content['about']['subtitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">About Description</label>
                            <textarea rows="3" name="content[about][description]" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground resize-none">{{ $content['about']['description'] }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Mission Title</label>
                            <input type="text" name="content[about][missionTitle]" value="{{ $content['about']['missionTitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Mission Text</label>
                            <input type="text" name="content[about][missionText]" value="{{ $content['about']['missionText'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>

                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Collection Hero Title</label>
                            <input type="text" name="content[collection][heroTitle]" value="{{ $content['collection']['heroTitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Collection Hero Description</label>
                            <input type="text" name="content[collection][heroDescription]" value="{{ $content['collection']['heroDescription'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Collection Label</label>
                            <input type="text" name="content[collection][sectionLabel]" value="{{ $content['collection']['sectionLabel'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Collection Title</label>
                            <input type="text" name="content[collection][sectionTitle]" value="{{ $content['collection']['sectionTitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Philosophy Quote</label>
                            <textarea rows="3" name="content[philosophy][quote]" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground resize-none">{{ $content['philosophy']['quote'] }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Philosophy Author</label>
                            <input type="text" name="content[philosophy][author]" value="{{ $content['philosophy']['author'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>

                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Verification Title</label>
                            <input type="text" name="content[verification][title]" value="{{ $content['verification']['title'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Verification Subtitle</label>
                            <input type="text" name="content[verification][subtitle]" value="{{ $content['verification']['subtitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Verification Description</label>
                            <textarea rows="3" name="content[verification][description]" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground resize-none">{{ $content['verification']['description'] }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Process Title</label>
                            <input type="text" name="content[verification][processTitle]" value="{{ $content['verification']['processTitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>

                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Contact Title</label>
                            <input type="text" name="content[contact][title]" value="{{ $content['contact']['title'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Contact Subtitle</label>
                            <input type="text" name="content[contact][subtitle]" value="{{ $content['contact']['subtitle'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Contact Email</label>
                            <input type="text" name="content[contact][email]" value="{{ $content['contact']['email'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Contact Phone</label>
                            <input type="text" name="content[contact][phone]" value="{{ $content['contact']['phone'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Contact Address</label>
                            <input type="text" name="content[contact][address]" value="{{ $content['contact']['address'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>

                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Footer Tagline</label>
                            <input type="text" name="content[footer][tagline]" value="{{ $content['footer']['tagline'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                        <div>
                            <label class="block text-sm tracking-wide text-foreground/60 mb-2 uppercase">Footer Copyright</label>
                            <input type="text" name="content[footer][copyright]" value="{{ $content['footer']['copyright'] }}" class="w-full bg-background/60 border border-primary/30 px-4 py-3 text-foreground" />
                        </div>
                    </div>

                    <button class="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">
                        Save Content
                    </button>
                </form>
            </div>

            <div data-admin-panel="media" class="hidden">
                <div class="space-y-6">
                    <div class="backdrop-blur-sm bg-primary/5 border border-primary/20 p-4 text-sm text-foreground/70">
                        <p class="font-semibold text-primary mb-2">Media Library</p>
                        <p>Update hero and section images. Use full Unsplash URLs with <span class="font-mono">?w=1600&q=80</span> for best quality.</p>
                    </div>

                    @foreach ($mediaImages as $image)
                        <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-6">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-3">
                                    <div class="aspect-video overflow-hidden bg-background/60 border border-primary/10">
                                        <img src="{{ $image->url }}" alt="{{ $image->name }}" class="w-full h-full object-cover" />
                                    </div>
                                    <p class="text-xs text-foreground/50 break-all font-mono">{{ $image->url }}</p>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <h4 class="font-display text-xl text-primary mb-1">{{ $image->name }}</h4>
                                        <p class="text-sm text-foreground/60">{{ $image->description }}</p>
                                        <p class="text-xs text-foreground/40 mt-2">{{ $image->location }}</p>
                                    </div>
                                    <form method="post" action="{{ route('admin.media.update', $image->id) }}" class="space-y-3">
                                        @csrf
                                        <div>
                                            <label class="block text-xs tracking-wide text-foreground/60 mb-2 uppercase">Image URL</label>
                                            <input type="text" name="url" value="{{ $image->url }}" class="w-full bg-background/60 border border-primary/30 px-3 py-2 text-sm text-foreground" />
                                        </div>
                                        <button type="submit" class="px-4 py-2 bg-primary/10 border border-primary/40 hover:bg-primary/20 transition-all duration-500 text-primary text-sm">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div data-admin-panel="products" class="hidden">
                <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-display text-xl text-primary">Product Management</h3>
                        <button class="px-6 py-3 bg-primary/10 border border-primary/40 hover:bg-primary/20 hover:border-primary/60 transition-all duration-500 text-primary tracking-wider">
                            Add Product
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($recentBars as $bar)
                            <div class="backdrop-blur-sm bg-background/40 border border-primary/20 p-4">
                                <h4 class="font-display text-lg text-primary mb-2">{{ ucfirst($bar->metal_type) }} Alloy</h4>
                                <p class="text-xs text-foreground/60 mb-3">Stock item</p>
                                <p class="text-sm text-foreground/70">Weight: {{ $bar->weight }} g</p>
                                <p class="text-sm text-foreground/70">Status: {{ ucfirst($bar->status) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
