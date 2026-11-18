<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductManagerController;
use App\Http\Controllers\Admin\CharmManagerController;
use App\Http\Controllers\Admin\OrderManagerController;
use App\Http\Controllers\Admin\SettingManagerController;
use App\Services\CurrencyService;

// 1. Root redirect (default to Arabic 'ar')
Route::get('/', function () {
    return redirect('/ar');
});

// 2. Global Currency Switcher
Route::get('/currency/{code}', function ($code) {
    CurrencyService::set($code);
    return back();
})->name('currency.switch');

// 3. Localized Storefront Routes (ar | en)
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

    // Wishlist & Saved 3D Builds
    Route::get('/wishlist', function () {
        return view('wishlist');
    })->name('wishlist');

    // Collector Account & Order Tracking
    Route::get('/account', function () {
        return view('account');
    })->name('account');

    // About & Story
    Route::get('/about', function () {
        return view('about');
    })->name('about');
});

// 4. Admin Management Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Products Management
    Route::get('/products', [ProductManagerController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductManagerController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductManagerController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductManagerController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductManagerController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductManagerController::class, 'destroy'])->name('admin.products.destroy');

    // 3D Charms Management
    Route::get('/charms', [CharmManagerController::class, 'index'])->name('admin.charms.index');
    Route::get('/charms/create', [CharmManagerController::class, 'create'])->name('admin.charms.create');
    Route::post('/charms', [CharmManagerController::class, 'store'])->name('admin.charms.store');
    Route::get('/charms/{id}/edit', [CharmManagerController::class, 'edit'])->name('admin.charms.edit');
    Route::put('/charms/{id}', [CharmManagerController::class, 'update'])->name('admin.charms.update');
    Route::delete('/charms/{id}', [CharmManagerController::class, 'destroy'])->name('admin.charms.destroy');

    // Client Commissions & Orders
    Route::get('/orders', [OrderManagerController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderManagerController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}/status', [OrderManagerController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    // Currency & Store Settings
    Route::get('/settings', [SettingManagerController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [SettingManagerController::class, 'update'])->name('admin.settings.update');
});
