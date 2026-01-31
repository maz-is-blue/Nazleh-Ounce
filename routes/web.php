<?php

use App\Http\Controllers\AdminBarController;
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

Route::get('/heritage', function () {
    return view('marketing.heritage');
})->name('marketing.heritage');

Route::get('/assay', function () {
    return view('marketing.assay');
})->name('marketing.assay');

Route::middleware('throttle:public-bar')->group(function () {
    Route::get('/q/{public_id}', [PublicBarController::class, 'redirect'])->name('qr.redirect');
    Route::get('/bar/{public_id}', [PublicBarController::class, 'show'])->name('bar.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserBarController::class, 'index'])->name('dashboard');
    Route::get('/account/bars', [UserBarController::class, 'index'])->name('account.bars.index');
    Route::get('/account/bars/{bar}', [UserBarController::class, 'show'])->name('account.bars.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/bars', [AdminBarController::class, 'index'])->name('bars.index');
    Route::get('/bars/create', [AdminBarController::class, 'create'])->name('bars.create');
    Route::post('/bars', [AdminBarController::class, 'store'])->name('bars.store');
    Route::post('/bars/batch', [AdminBarController::class, 'batch'])->name('bars.batch');
    Route::post('/bars/{bar}/assign', [AdminBarController::class, 'assign'])->name('bars.assign');
});

require __DIR__ . '/auth.php';
