<?php

use App\Http\Controllers\AdminBarController;
use App\Http\Controllers\AdminBarPoolController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMediaController;
use App\Http\Controllers\PublicOwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicBarController;
use App\Http\Controllers\UserBarController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

RateLimiter::for('public-bar', function (Request $request) {
    return Limit::perMinute(config('qr.rate_limit_per_minute'))
        ->by($request->ip());
});

Route::get('/', function () {
    return view('marketing.home');
});

Route::get('/about', function () {
    return view('marketing.about');
});

Route::get('/collection', function () {
    return view('marketing.collection');
});

Route::get('/verification', function () {
    return view('marketing.verification');
});

Route::get('/contact', function () {
    return view('marketing.contact');
});

Route::get('/collection/{slug}', function (string $slug) {
    $products = [
        '24k-gold-bar' => [
            'name' => '24K Gold Bar',
            'subtitle' => 'Investment-Grade Gold Alloy',
            'price' => '$2,450',
            'unit' => 'per oz',
            'description' => 'A premium investment-grade gold bar crafted with precision and authenticated for purity.',
            'long_description' => 'Each 24K gold bar is finished with a mirror-like polish and laser-engraved markings, providing exceptional traceability and legacy-grade quality.',
            'purity' => '999.9 Fine Gold',
            'stock' => 124,
            'weight' => '1 oz, 5 oz, 10 oz',
            'features' => [
                'Individually serialized and registered',
                'Assay-certified purity and weight',
                'Tamper-evident packaging with authenticity seal',
            ],
            'specifications' => [
                'Metal Type' => 'Gold (Au)',
                'Purity' => '999.9',
                'Weight' => '1 troy oz',
                'Dimensions' => '50mm x 28mm x 2mm',
                'Finish' => 'Mirror polish',
                'Certification' => 'Independent assay report',
            ],
            'images' => [
                'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1768359666502-306694fa6fcf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBnb2xkJTIwYmFycyUyMHZhdWx0fGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ],
        'silver-bullion' => [
            'name' => 'Silver Bullion',
            'subtitle' => 'Investment Grade Silver Bullion',
            'price' => '$185',
            'unit' => 'per oz',
            'description' => 'Premium silver bullion with a luminous finish and verified purity.',
            'long_description' => 'Silver Bullion bars are curated for collectors and institutions, featuring complete documentation and QR-based verification.',
            'purity' => '999 Fine Silver',
            'stock' => 856,
            'weight' => '5 oz, 10 oz, 1 kg',
            'features' => [
                'High-density silver cast',
                'Complete provenance documentation',
                'Secure delivery and storage options',
            ],
            'specifications' => [
                'Metal Type' => 'Silver (Ag)',
                'Purity' => '999',
                'Weight' => '10 troy oz',
                'Dimensions' => '90mm x 52mm x 8mm',
                'Finish' => 'Satin polish',
                'Certification' => 'Independent assay report',
            ],
            'images' => [
                'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1598724168411-9ba1e003a7fe?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFscyUyMGNyYWZ0c21hbnNoaXAlMjBhcnRpc2FufGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ],
        'gold-ingot' => [
            'name' => 'Gold Ingot',
            'subtitle' => 'Certified Gold Ingot',
            'price' => '$12,100',
            'unit' => 'per 5 oz',
            'description' => 'Substantial gold ingot crafted for long-term preservation.',
            'long_description' => 'Gold Ingots are serialized, sealed, and accompanied by comprehensive verification reports.',
            'purity' => '999.9 Fine Gold',
            'stock' => 38,
            'weight' => '5 oz',
            'features' => [
                'Serialized ingot with QR verification',
                'Assay-certified purity and weight',
                'Secure storage packaging',
            ],
            'specifications' => [
                'Metal Type' => 'Gold (Au)',
                'Purity' => '999.9',
                'Weight' => '5 troy oz',
                'Dimensions' => '80mm x 40mm x 5mm',
                'Finish' => 'Brushed polish',
                'Certification' => 'Independent assay report',
            ],
            'images' => [
                'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1768359666502-306694fa6fcf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBnb2xkJTIwYmFycyUyMHZhdWx0fGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ],
        '22k-gold-alloy' => [
            'name' => '22K Gold Alloy',
            'subtitle' => '22K Gold Alloy Bar',
            'price' => '$1,950',
            'unit' => 'per 50 g',
            'description' => 'A refined 22K gold alloy with a classic finish.',
            'long_description' => 'This alloy is ideal for collectors seeking a balance of durability and high purity.',
            'purity' => '916 Fine Gold',
            'stock' => 72,
            'weight' => '50 g',
            'features' => [
                'Durable alloy blend',
                'Serialized and authenticated',
                'Protective storage casing',
            ],
            'specifications' => [
                'Metal Type' => 'Gold (Au)',
                'Purity' => '916',
                'Weight' => '50 g',
                'Dimensions' => '45mm x 26mm x 3mm',
                'Finish' => 'Matte',
                'Certification' => 'Independent assay report',
            ],
            'images' => [
                'https://images.unsplash.com/photo-1762463176319-8416bf1e6a8e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwYmFyJTIwYnVsbGlvbiUyMGx1eHVyeXxlbnwxfHx8fDE3NjkyNjk0MDF8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1768359666502-306694fa6fcf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBnb2xkJTIwYmFycyUyMHZhdWx0fGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ],
        'silver-bar' => [
            'name' => 'Silver Bar',
            'subtitle' => '1 Kilogram Silver Bar',
            'price' => '$1,230',
            'unit' => 'per kg',
            'description' => 'High-volume silver bar crafted for institutional holdings.',
            'long_description' => 'The 1 kg silver bar offers efficient storage with full verification documentation.',
            'purity' => '999 Fine Silver',
            'stock' => 210,
            'weight' => '1 kg',
            'features' => [
                'High-density silver casting',
                'Institutional grade certification',
                'Secure vault packaging',
            ],
            'specifications' => [
                'Metal Type' => 'Silver (Ag)',
                'Purity' => '999',
                'Weight' => '1 kg',
                'Dimensions' => '110mm x 60mm x 15mm',
                'Finish' => 'Satin polish',
                'Certification' => 'Independent assay report',
            ],
            'images' => [
                'https://images.unsplash.com/photo-1621028025774-104e1816b176?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzaWx2ZXIlMjBidWxsaW9uJTIwYmFyc3xlbnwxfHx8fDE3NjkyNjk0MDJ8MA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1598724168411-9ba1e003a7fe?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFscyUyMGNyYWZ0c21hbnNoaXAlMjBhcnRpc2FufGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ],
        'gold-bar' => [
            'name' => 'Gold Bar',
            'subtitle' => '999.9 Fine Gold Bar',
            'price' => '$6,450',
            'unit' => 'per 100 g',
            'description' => 'A refined 100 g gold bar with premium finishing.',
            'long_description' => 'The 100 g gold bar is a balanced choice for collectors and institutions.',
            'purity' => '999.9 Fine Gold',
            'stock' => 58,
            'weight' => '100 g',
            'features' => [
                'Laser-engraved serial number',
                'Assay-certified purity',
                'Protective casing for storage',
            ],
            'specifications' => [
                'Metal Type' => 'Gold (Au)',
                'Purity' => '999.9',
                'Weight' => '100 g',
                'Dimensions' => '65mm x 35mm x 4mm',
                'Finish' => 'Mirror polish',
                'Certification' => 'Independent assay report',
            ],
            'images' => [
                'https://images.unsplash.com/photo-1762463176318-3cc33ec64ba2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVjaW91cyUyMG1ldGFsJTIwaW5nb3R8ZW58MXx8fHwxNzY5MjY5NDAyfDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1768359666502-306694fa6fcf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsdXh1cnklMjBnb2xkJTIwYmFycyUyMHZhdWx0fGVufDF8fHx8MTc3MDAyNDYzNnww&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
                'https://images.unsplash.com/photo-1637597383958-d777c022e241?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnb2xkJTIwc2lsdmVyJTIwYnVsbGlvbiUyMGNvbGxlY3Rpb258ZW58MXx8fHwxNzcwMDI0NjM3fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral',
            ],
        ],
    ];

    if (!isset($products[$slug])) {
        abort(404);
    }

    return view('marketing.product-details', [
        'product' => $products[$slug],
    ]);
});

Route::get('/heritage', function () {
    return view('marketing.heritage');
})->name('marketing.heritage');

Route::get('/assay', function () {
    return view('marketing.assay');
})->name('marketing.assay');

Route::middleware('throttle:public-bar')->group(function () {
    Route::get('/q/{public_id}', [PublicBarController::class, 'redirect'])->name('qr.redirect');
    Route::get('/bar/{public_id}', [PublicBarController::class, 'show'])->name('bar.show');
    Route::get('/owner/{user}', [PublicOwnerController::class, 'show'])->name('owner.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/account', function () {
        $user = request()->user();
        $bars = $user->bars()
            ->orderByDesc('sold_at')
            ->orderByDesc('created_at')
            ->get();

        return view('marketing.account', [
            'bars' => $bars,
        ]);
    })->name('account');

    Route::get('/dashboard', [UserBarController::class, 'index'])->name('dashboard');
    Route::get('/account/bars', [UserBarController::class, 'index'])->name('account.bars.index');
    Route::get('/account/bars/{bar}', [UserBarController::class, 'show'])->name('account.bars.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'show'])->name('dashboard');
    Route::get('/bars', [AdminBarController::class, 'index'])->name('bars.index');
    Route::get('/bars/create', [AdminBarController::class, 'create'])->name('bars.create');
    Route::post('/bars', [AdminBarController::class, 'store'])->name('bars.store');
    Route::post('/bars/batch', [AdminBarController::class, 'batch'])->name('bars.batch');
    Route::post('/bars/{bar}/assign', [AdminBarController::class, 'assign'])->name('bars.assign');
    Route::post('/bars/assign-from-pool', [AdminBarController::class, 'assignFromPool'])->name('bars.assignFromPool');
    Route::post('/bars/assign-flow', [AdminBarController::class, 'assignFlow'])->name('bars.assignFlow');
    Route::post('/bars/seed-pool', [AdminBarPoolController::class, 'seed'])->name('bars.seedPool');
    Route::post('/media/{mediaImage}', [AdminMediaController::class, 'update'])->name('media.update');
    Route::post('/content', [AdminContentController::class, 'update'])->name('content.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', function () {
        return view('admin.login');
    })->name('admin.login');
});

require __DIR__ . '/auth.php';
