<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaImage extends Model
{
    protected $fillable = [
        'key',
        'name',
        'description',
        'location',
        'url',
    ];
}
