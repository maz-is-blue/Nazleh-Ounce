<?php

namespace App\Services;

use App\Models\MetalPrice;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MetalPriceService
{
    public function getLatest(): array
    {
        $prices = MetalPrice::query()->get();

        $grouped = [];
        foreach ($prices as $price) {
            $grouped[$price->currency][$price->metal] = $price;
        }

        return $grouped;
    }

    public function shouldRefresh(): bool
    {
        $latest = MetalPrice::query()->max('fetched_at');
        if (!$latest) {
            return true;
        }

        $minutes = (int) Config::get('pricing.cache_minutes', 60);
        return Carbon::parse($latest)->addMinutes($minutes)->isPast();
    }

    public function sync(): void
    {
        $response = Http::timeout(10)->get('https://metals.live/api/spot');

        if (!$response->ok()) {
            Log::warning('metals.live API request failed', ['status' => $response->status()]);
            return;
        }

        $data = $response->json();

        $goldUsd = isset($data['gold']) ? (float) $data['gold'] : null;
        $silverUsd = isset($data['silver']) ? (float) $data['silver'] : null;

        if ($goldUsd === null && $silverUsd === null) {
            Log::warning('metals.live returned no gold or silver price', ['body' => $data]);
            return;
        }

        $aedPeg = Config::get('pricing.aed_usd_peg', 3.6725);

        $currencies = Config::get('pricing.currencies', ['USD', 'AED']);

        foreach ($currencies as $currency) {
            $multiplier = strtoupper($currency) === 'AED' ? $aedPeg : 1.0;

            if ($goldUsd !== null) {
                $this->storePrice('gold', $currency, $goldUsd * $multiplier);
            }
            if ($silverUsd !== null) {
                $this->storePrice('silver', $currency, $silverUsd * $multiplier);
            }
        }
    }

    private function storePrice(string $metal, string $currency, float $ouncePrice): void
    {
        $halfKgOunces = (float) Config::get('pricing.units.half_kg_oz');
        $kgOunces = (float) Config::get('pricing.units.kg_oz');

        MetalPrice::updateOrCreate(
            ['metal' => $metal, 'currency' => $currency],
            [
                'price_oz' => $ouncePrice,
                'price_half_kg' => $ouncePrice * $halfKgOunces,
                'price_kg' => $ouncePrice * $kgOunces,
                'fetched_at' => now(),
                'source' => 'metals.live',
            ]
        );
    }
}
