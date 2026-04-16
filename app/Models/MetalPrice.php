<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetalPrice extends Model
{
    protected $fillable = [
        'metal',
        'currency',
        'price_oz',
        'price_half_kg',
        'price_kg',
        'fetched_at',
        'source',
    ];

    protected $casts = [
        'price_oz' => 'decimal:4',
        'price_half_kg' => 'decimal:4',
        'price_kg' => 'decimal:4',
        'fetched_at' => 'datetime',
    ];
}

