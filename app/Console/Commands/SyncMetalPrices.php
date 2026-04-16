<?php

namespace App\Console\Commands;

use App\Services\MetalPriceService;
use Illuminate\Console\Command;

class SyncMetalPrices extends Command
{
    protected $signature = 'prices:sync';
    protected $description = 'Sync metal prices from GoldPriceZ.';

    public function handle(MetalPriceService $service): int
    {
        $service->sync();
        $this->info('Metal prices synced.');

        return self::SUCCESS;
    }
}

