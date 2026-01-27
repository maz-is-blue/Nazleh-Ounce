<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\BarOwnershipEvent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminBarController extends Controller
{
    public function index(Request $request): View
    {
        $bars = Bar::query()
            ->with('owner')
            ->when($request->filled('public_id'), function ($query) use ($request) {
                $query->where('public_id', 'like', '%' . $request->string('public_id') . '%');
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->string('status'));
            })
            ->orderByDesc('created_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.bars.index', [
            'bars' => $bars,
            'filters' => $request->only(['public_id', 'status']),
        ]);
    }

    public function create(): View
    {
        return view('admin.bars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'metal_type' => ['required', 'in:gold,silver'],
            'weight' => ['required', 'numeric', 'min:0.001'],
            'purity' => ['nullable', 'string', 'max:50'],
        ]);

        $bar = Bar::create([
            'public_id' => (string) Str::ulid(),
            'metal_type' => $data['metal_type'],
            'weight' => $data['weight'],
            'purity' => $data['purity'] ?? null,
            'status' => 'unsold',
        ]);

        return redirect()
            ->route('admin.bars.index')
            ->with('status', 'Bar created: ' . $bar->public_id);
    }

    public function batch(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'count' => ['required', 'integer', 'min:1', 'max:1000'],
            'metal_type' => ['required', 'in:gold,silver'],
            'weight' => ['required', 'numeric', 'min:0.001'],
            'purity' => ['nullable', 'string', 'max:50'],
        ]);

        $bars = [];
        for ($i = 0; $i < $data['count']; $i++) {
            $bars[] = [
                'public_id' => (string) Str::ulid(),
                'metal_type' => $data['metal_type'],
                'weight' => $data['weight'],
                'purity' => $data['purity'] ?? null,
                'status' => 'unsold',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Bar::insert($bars);

        return redirect()
            ->route('admin.bars.index')
            ->with('status', 'Batch created: ' . $data['count'] . ' bars.');
    }

    public function assign(Request $request, Bar $bar): RedirectResponse
    {
        $data = $request->validate([
            'buyer_name' => ['required', 'string', 'max:255'],
            'buyer_email' => ['required', 'email', 'max:255'],
            'force_reassign' => ['nullable', 'boolean'],
        ]);

        if ($bar->status === 'sold' && !$request->boolean('force_reassign')) {
            return redirect()
                ->back()
                ->withErrors(['bar' => 'Bar is already sold. Use force reassign to override.']);
        }

        DB::transaction(function () use ($data, $bar) {
            $user = User::firstOrCreate(
                ['email' => $data['buyer_email']],
                ['name' => $data['buyer_name'], 'password' => bcrypt(Str::random(32))]
            );

            $fromUserId = $bar->owner_user_id;
            $bar->update([
                'owner_user_id' => $user->id,
                'status' => 'sold',
                'sold_at' => now(),
            ]);

            BarOwnershipEvent::create([
                'bar_id' => $bar->id,
                'from_user_id' => $fromUserId,
                'to_user_id' => $user->id,
                'action' => $fromUserId ? 'transferred' : 'assigned',
                'note' => null,
            ]);
        });

        return redirect()
            ->route('admin.bars.index')
            ->with('status', 'Bar assigned: ' . $bar->public_id);
    }
}
