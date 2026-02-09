<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Bar extends Model
{
    use HasFactory;

    public const HUMAN_CODE_START = 666;

    protected $fillable = [
        'public_id',
        'human_code_number',
        'human_code_prefix',
        'metal_type',
        'weight',
        'purity',
        'status',
        'owner_user_id',
        'sold_at',
    ];

    protected $casts = [
        'sold_at' => 'datetime',
        'weight' => 'decimal:3',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function ownershipEvents(): HasMany
    {
        return $this->hasMany(BarOwnershipEvent::class);
    }

    public function getHumanCodeAttribute(): ?string
    {
        if ($this->human_code_number === null || $this->human_code_prefix === null) {
            return null;
        }

        return $this->human_code_prefix . str_pad((string) $this->human_code_number, 6, '0', STR_PAD_LEFT);
    }

    public function getDisplaySerialAttribute(): ?string
    {
        if ($this->human_code_number === null || $this->human_code_prefix === null) {
            return null;
        }

        return $this->human_code_prefix . '-' . str_pad((string) $this->human_code_number, 6, '0', STR_PAD_LEFT);
    }

    public static function resolveHumanCodePrefix(string $metalType, $weight): ?string
    {
        $normalizedWeight = number_format((float) $weight, 3, '.', '');
        $seriesKey = $metalType . ':' . $normalizedWeight;
        $series = config('qr.label_series', []);

        if (!isset($series[$seriesKey])) {
            return self::resolveDefaultPrefix($metalType);
        }

        return $series[$seriesKey]['prefix'] ?? null;
    }

    public static function resolveDefaultPrefix(string $metalType): ?string
    {
        $defaults = config('qr.default_prefixes', []);
        return $defaults[$metalType] ?? null;
    }

    public static function allocateHumanCodeNumbersForPrefix(string $prefix, int $count): array
    {
        if ($count < 1) {
            return [];
        }

        return DB::transaction(function () use ($count, $prefix) {
            $seriesStart = self::startNumberForPrefix($prefix);
            $last = static::query()
                ->where('human_code_prefix', $prefix)
                ->whereNotNull('human_code_number')
                ->orderByDesc('human_code_number')
                ->lockForUpdate()
                ->value('human_code_number');

            $last = $last ?? ($seriesStart - 1);

            $numbers = [];
            for ($i = 1; $i <= $count; $i++) {
                $numbers[] = $last + $i;
            }

            return $numbers;
        });
    }

    public static function nextUnassignedFromPool(?string $prefix = null): ?self
    {
        $query = static::query()
            ->whereNull('owner_user_id')
            ->where(function ($query) {
                $query->whereNull('status')
                    ->orWhere('status', 'unsold');
            })
            ->whereNotNull('human_code_number')
            ->whereNotNull('human_code_prefix')
            ->orderBy('human_code_number');

        if ($prefix) {
            $query->where('human_code_prefix', $prefix);
        }

        return $query->lockForUpdate()->first();
    }

    private static function startNumberForPrefix(string $prefix): int
    {
        $starts = config('qr.prefix_starts', []);
        if (isset($starts[$prefix])) {
            return (int) $starts[$prefix];
        }

        $series = config('qr.label_series', []);

        foreach ($series as $config) {
            if (($config['prefix'] ?? null) === $prefix) {
                return (int) ($config['start'] ?? 1);
            }
        }

        return 1;
    }

    public static function nextNumberForPrefix(string $prefix): int
    {
        $last = static::query()
            ->where('human_code_prefix', $prefix)
            ->whereNotNull('human_code_number')
            ->orderByDesc('human_code_number')
            ->value('human_code_number');

        $last = $last ?? (self::startNumberForPrefix($prefix) - 1);

        return $last + 1;
    }

    public static function formatHumanCode(string $prefix, int $number): string
    {
        return $prefix . str_pad((string) $number, 6, '0', STR_PAD_LEFT);
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }
}
