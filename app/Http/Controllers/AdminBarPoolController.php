<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminBarPoolController extends Controller
{
    public function seed(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'prefix' => ['required', 'string', 'max:4'],
            'start' => ['required', 'integer', 'min:1'],
            'count' => ['required', 'integer', 'min:1', 'max:5000'],
            'metal_type' => ['required', 'in:gold,silver'],
            'weight' => ['required', 'numeric', 'min:0.001'],
            'purity' => ['nullable', 'string', 'max:50'],
        ]);

        $prefix = strtoupper(trim($data['prefix']));
        $start = (int) $data['start'];
        $count = (int) $data['count'];
        $end = $start + $count - 1;

        $existing = Bar::query()
            ->where('human_code_prefix', $prefix)
            ->whereBetween('human_code_number', [$start, $end])
            ->pluck('human_code_number')
            ->all();

        $existingLookup = array_fill_keys($existing, true);

        $rows = [];
        for ($number = $start; $number <= $end; $number++) {
            if (isset($existingLookup[$number])) {
                continue;
            }

            $rows[] = [
                'public_id' => (string) Str::ulid(),
                'human_code_number' => $number,
                'human_code_prefix' => $prefix,
                'metal_type' => $data['metal_type'],
                'weight' => $data['weight'],
                'purity' => $data['purity'] ?? null,
                'status' => 'unsold',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::transaction(function () use ($rows) {
            if (!empty($rows)) {
                Bar::insert($rows);
            }
        });

        $created = count($rows);

        return redirect()
            ->route('admin.bars.index')
            ->with('status', "Seeded {$created} QR bars for series.");
    }
}
