<?php

return [
    'base_url' => env('QR_BASE_URL', env('APP_URL')),
    'rate_limit_per_minute' => env('QR_RATE_LIMIT_PER_MINUTE', 60),
];
