<?php

return [
    'base_url' => env('QR_BASE_URL', env('APP_URL')),
    'rate_limit_per_minute' => env('QR_RATE_LIMIT_PER_MINUTE', 60),
    'label_series' => [
        // key format: "{metal}:{weight_in_grams}"
        'silver:1000.000' => [
            'prefix' => 'H',
            'start' => 666,
        ],
    ],
];
