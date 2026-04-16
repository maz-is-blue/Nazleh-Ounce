<?php

namespace App\Services;

use App\Models\MetalPrice;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
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
        $currencies = Config::get('pricing.currencies', []);
        $baseUrl = Config::get('pricing.goldpricez.base_url');
        $apiKey = Config::get('pricing.goldpricez.api_key');

        if (!$baseUrl || !$apiKey) {
            Log::warning('GoldPriceZ API not configured.');
            return;
        }

        foreach ($currencies as $currency) {
            $this->syncCurrency($currency, $baseUrl, $apiKey);
        }
    }

    private function syncCurrency(string $currency, string $baseUrl, string $apiKey): void
    {
        $currencyLower = strtolower($currency);
        $endpoint = rtrim($baseUrl, '/') . "/currency/{$currencyLower}/measure/ounce/metal/all";

        $response = Http::timeout(10)
            ->withHeaders(['X-API-KEY' => $apiKey])
            ->get($endpoint);

        if (!$response->ok()) {
            Log::warning('GoldPriceZ API request failed', [
                'currency' => $currency,
                'status' => $response->status(),
            ]);
            return;
        }

        $data = $response->json();

        $goldOunce = $this->resolveGoldOunce($data, $currencyLower);
        $silverOunce = $this->resolveSilverOunce($data, $currencyLower);

        if ($goldOunce !== null) {
            $this->storePrice('gold', $currency, $goldOunce);
        }
        if ($silverOunce !== null) {
            $this->storePrice('silver', $currency, $silverOunce);
        }
    }

    private function resolveGoldOunce(array $data, string $currencyLower): ?float
    {
        if ($currencyLower === 'usd') {
            $value = $data['ounce_price_usd'] ?? $data['ounce_in_usd'] ?? null;
            return $this->toFloat($value);
        }

        $value = $data["ounce_in_{$currencyLower}"] ?? $data["ounce_price_{$currencyLower}"] ?? null;
        return $this->toFloat($value);
    }

    private function resolveSilverOunce(array $data, string $currencyLower): ?float
    {
        if ($currencyLower === 'usd') {
            $value = $data['silver_ounce_price_usd'] ?? $data['silver_ounce_in_usd'] ?? null;
            return $this->toFloat($value);
        }

        $value = $data["silver_ounce_in_{$currencyLower}"]
            ?? $data["silver_ounce_price_{$currencyLower}"]
            ?? $data["silver_ounce_price_ask_{$currencyLower}"]
            ?? null;

        return $this->toFloat($value);
    }

    private function storePrice(string $metal, string $currency, float $ouncePrice): void
    {
        $halfKgOunces = (float) Config::get('pricing.units.half_kg_oz');
        $kgOunces = (float) Config::get('pricing.units.kg_oz');

        $priceHalf = $ouncePrice * $halfKgOunces;
        $priceKg = $ouncePrice * $kgOunces;

        MetalPrice::updateOrCreate(
            ['metal' => $metal, 'currency' => $currency],
            [
                'price_oz' => $ouncePrice,
                'price_half_kg' => $priceHalf,
                'price_kg' => $priceKg,
                'fetched_at' => now(),
                'source' => 'goldpricez',
            ]
        );
    }

    private function toFloat($value): ?float
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (float) $value;
    }
}

