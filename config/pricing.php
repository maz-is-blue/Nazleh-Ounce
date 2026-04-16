<?php

return [
    'provider' => 'goldpricez',
    'currencies' => ['USD', 'AED'],
    'metals' => ['gold', 'silver'],
    'cache_minutes' => 60,
    'goldpricez' => [
        'base_url' => 'https://goldpricez.com/api/rates',
        'api_key' => env('GOLDPRICEZ_API_KEY'),
    ],
    'units' => [
        'ounce' => 1,
        'half_kg_oz' => 16.07535,
        'kg_oz' => 32.1507,
    ],
];

