<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\BarOwnershipEvent;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Mail\BarAssignedMail;

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

        $seriesPrefixes = collect(config('qr.label_series', []))
            ->pluck('prefix')
            ->filter()
            ->unique()
            ->values()
            ->all();

        $defaultPrefixes = config('qr.default_prefixes', []);
        $prefixes = collect($defaultPrefixes)
            ->filter()
            ->unique()
            ->values()
            ->all();

        $existingSerials = [];
        $newSerials = [];
        $existingNumbers = [];
        $newNumbers = [];
        foreach ($prefixes as $prefix) {
            $nextExisting = Bar::nextUnassignedFromPool($prefix);
            $existingNumbers[$prefix] = $nextExisting?->human_code_number;
            $newNumbers[$prefix] = Bar::nextNumberForPrefix($prefix);
            $existingSerials[$prefix] = $existingNumbers[$prefix] !== null
                ? Bar::formatHumanCode($prefix, $existingNumbers[$prefix])
                : null;
            $newSerials[$prefix] = Bar::formatHumanCode($prefix, $newNumbers[$prefix]);
        }

        return view('admin.bars.index', [
            'bars' => $bars,
            'filters' => $request->only(['public_id', 'status']),
            'seriesPrefixes' => $seriesPrefixes,
            'defaultPrefixes' => $defaultPrefixes,
            'existingSerials' => $existingSerials,
            'newSerials' => $newSerials,
            'existingNumbers' => $existingNumbers,
            'newNumbers' => $newNumbers,
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

        $humanCodePrefix = Bar::resolveHumanCodePrefix($data['metal_type'], $data['weight']);
        $humanCodeNumber = $humanCodePrefix
            ? Bar::allocateHumanCodeNumbersForPrefix($humanCodePrefix, 1)[0] ?? null
            : null;

        $bar = Bar::create([
            'public_id' => (string) Str::ulid(),
            'human_code_number' => $humanCodeNumber,
            'human_code_prefix' => $humanCodePrefix,
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

        $humanCodePrefix = Bar::resolveHumanCodePrefix($data['metal_type'], $data['weight']);
        $humanCodeNumbers = $humanCodePrefix
            ? Bar::allocateHumanCodeNumbersForPrefix($humanCodePrefix, $data['count'])
            : [];

        $bars = [];
        for ($i = 0; $i < $data['count']; $i++) {
            $bars[] = [
                'public_id' => (string) Str::ulid(),
                'human_code_number' => $humanCodeNumbers[$i] ?? null,
                'human_code_prefix' => $humanCodePrefix,
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
            $this->assignBarToUser($bar, $data);
        });

        try {
            $bar->refresh();
            $user = User::where('email', $data['buyer_email'])->first();
            if ($user) {
                Mail::to($user->email)->send(new BarAssignedMail($bar, $user));
            }
        } catch (\Throwable $e) {
            report($e);
            return redirect()
                ->route('admin.bars.index')
                ->with('status', 'Bar assigned: ' . $bar->public_id . ' (email failed)');
        }

        return redirect()
            ->route('admin.bars.index')
            ->with('status', 'Bar assigned: ' . $bar->public_id);
    }

    public function assignFromPool(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'buyer_name' => ['required', 'string', 'max:255'],
            'buyer_email' => ['required', 'email', 'max:255'],
            'prefix' => ['nullable', 'string', 'max:4'],
        ]);

        $prefixValue = $request->string('prefix')->trim()->upper()->toString();
        $prefix = $prefixValue !== '' ? $prefixValue : null;
        $assignedBar = null;

        DB::transaction(function () use ($data, $prefix, &$assignedBar) {
            $bar = Bar::nextUnassignedFromPool($prefix);
            if (!$bar) {
                return;
            }

            $this->assignBarToUser($bar, $data);
            $assignedBar = $bar;
        });

        if (!$assignedBar) {
            return redirect()
                ->route('admin.bars.index')
                ->withErrors(['pool' => 'No unassigned QR bars were found for the selected series.']);
        }

        try {
            $assignedBar->refresh();
            $user = User::where('email', $data['buyer_email'])->first();
            if ($user) {
                Mail::to($user->email)->send(new BarAssignedMail($assignedBar, $user));
            }
        } catch (\Throwable $e) {
            report($e);
            return redirect()
                ->route('admin.bars.index')
                ->with('status', 'Bar assigned: ' . $assignedBar->public_id . ' (email failed)');
        }

        return redirect()
            ->route('admin.bars.index')
            ->with('status', 'Bar assigned: ' . $assignedBar->public_id);
    }

    public function assignFlow(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'buyer_name' => ['required', 'string', 'max:255'],
            'buyer_email' => ['required', 'email', 'max:255'],
            'buyer_phone' => ['required', 'string', 'max:50'],
            'buyer_location' => ['required', 'string', 'max:255'],
            'bars' => ['required', 'array', 'min:1'],
            'bars.*.mode' => ['required', 'in:existing,new'],
            'bars.*.metal_type' => ['required', 'in:gold,silver'],
            'bars.*.weight' => ['nullable', 'numeric', 'min:0.001'],
            'bars.*.purity' => ['nullable', 'string', 'max:50'],
        ]);

        $assignedBars = [];

        try {
            DB::transaction(function () use ($data, &$assignedBars) {
                $user = User::firstOrCreate(
                    ['email' => $data['buyer_email']],
                    [
                        'name' => $data['buyer_name'],
                        'password' => bcrypt(Str::random(32)),
                    ]
                );

                $user->update([
                    'name' => $data['buyer_name'],
                    'phone' => $data['buyer_phone'],
                    'location' => $data['buyer_location'],
                ]);

                foreach ($data['bars'] as $barData) {
                    $mode = $barData['mode'];
                    $metal = $barData['metal_type'];
                    $weight = $barData['weight'] ?? null;
                    $purity = $barData['purity'] ?? null;

                    if ($mode === 'existing') {
                        $prefix = Bar::resolveDefaultPrefix($metal);
                        if (!$prefix) {
                            throw new \RuntimeException('No default prefix configured for ' . $metal);
                        }

                        $bar = Bar::nextUnassignedFromPool($prefix);
                        if (!$bar) {
                            throw new \RuntimeException('No unassigned QR bars available for ' . $prefix . ' series.');
                        }

                        $this->assignExistingBar($bar, $user);
                        $assignedBars[] = $bar;
                        continue;
                    }

                    if ($weight === null || $weight === '') {
                        throw new \RuntimeException('Weight is required when creating a new QR.');
                    }

                    $humanCodePrefix = Bar::resolveHumanCodePrefix($metal, $weight);
                    if (!$humanCodePrefix) {
                        throw new \RuntimeException('No QR prefix configured for ' . $metal . '.');
                    }

                    $number = Bar::allocateHumanCodeNumbersForPrefix($humanCodePrefix, 1)[0] ?? null;

                    $bar = Bar::create([
                        'public_id' => (string) Str::ulid(),
                        'human_code_number' => $number,
                        'human_code_prefix' => $humanCodePrefix,
                        'metal_type' => $metal,
                        'weight' => $weight ?? 0,
                        'purity' => $purity,
                        'status' => 'unsold',
                    ]);

                    $this->assignExistingBar($bar, $user);
                    $assignedBars[] = $bar;
                }
            });
        } catch (\RuntimeException $e) {
            return redirect()
                ->route('admin.bars.index')
                ->withErrors(['assign' => $e->getMessage()]);
        }

        try {
            $user = User::where('email', $data['buyer_email'])->first();
            if ($user) {
                foreach ($assignedBars as $bar) {
                    Mail::to($user->email)->send(new BarAssignedMail($bar, $user));
                }
            }
        } catch (\Throwable $e) {
            report($e);
            return redirect()
                ->route('admin.bars.index')
                ->with('status', 'Bars assigned (email failed).');
        }

        return redirect()
            ->route('admin.bars.index')
            ->with('status', 'Bars assigned: ' . count($assignedBars));
    }

    private function assignBarToUser(Bar $bar, array $data): void
    {
        $user = User::firstOrCreate(
            ['email' => $data['buyer_email']],
            ['name' => $data['buyer_name'], 'password' => bcrypt(Str::random(32))]
        );

        $fromUserId = $bar->owner_user_id;

        if ($bar->human_code_number === null || $bar->human_code_prefix === null) {
            $humanCodePrefix = Bar::resolveHumanCodePrefix($bar->metal_type, $bar->weight);
            if ($humanCodePrefix) {
                $number = Bar::allocateHumanCodeNumbersForPrefix($humanCodePrefix, 1)[0] ?? null;
                $bar->human_code_prefix = $humanCodePrefix;
                $bar->human_code_number = $number;
            }
        }

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
    }

    private function assignExistingBar(Bar $bar, User $user): void
    {
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
    }
}
