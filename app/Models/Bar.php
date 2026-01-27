<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bar extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_id',
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

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }
}
