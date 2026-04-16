<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

        View::composer(['marketing.account', 'account.bars.index'], function ($view) {
            try {
                $prices = app(\App\Services\MetalPriceService::class)->getLatest();
                $view->with('metalPrices', $prices);
            } catch (\Throwable $e) {
                $view->with('metalPrices', []);
            }
        });
    }
}
