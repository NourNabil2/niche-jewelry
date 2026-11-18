<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;

// 1. Root redirect (default to Arabic 'ar')
Route::get('/', function () {
    return redirect('/ar');
});

// 2. Localized Storefront Routes (ar | en)
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|ar'],
    'middleware' => ['locale']
], function () {
    // Home with Quiet Luxury Minimalist Hero
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // 3D Atelier Customizer Studio
    Route::get('/atelier', [StudioController::class, 'index'])->name('studio');
    Route::post('/api/studio/save-design', [StudioController::class, 'saveDesign'])->name('studio.save');

    // Collections Catalog
    Route::get('/collections', [CatalogController::class, 'index'])->name('collections');

    // Product Details (PDP)
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    // About & Story
    Route::get('/about', function () {
        return view('about');
    })->name('about');
});

// 3. Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
