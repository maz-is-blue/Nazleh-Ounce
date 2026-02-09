<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $contentService = app(\App\Services\ContentService::class);
            view()->share('content', $contentService->getContent());
        } catch (\Throwable $e) {
            view()->share('content', \App\Services\ContentService::DEFAULTS);
        }
    }
}
