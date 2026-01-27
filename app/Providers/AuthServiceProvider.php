<?php

namespace App\Providers;

use App\Models\Bar;
use App\Policies\BarPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Bar::class => BarPolicy::class,
    ];
}
