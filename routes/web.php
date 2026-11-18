<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ProductManagerController;
use App\Http\Controllers\Admin\CharmManagerController;
use App\Http\Controllers\Admin\OrderManagerController;
use App\Http\Controllers\Admin\SettingManagerController;
use App\Http\Controllers\Admin\PromotionManagerController;
use App\Http\Controllers\Admin\BannerManagerController;
use App\Http\Controllers\Admin\ThemeManagerController;
use App\Http\Controllers\Admin\AboutManagerController;
use App\Http\Controllers\Admin\MarketingManagerController;
use App\Services\CurrencyService;
use App\Models\Promotion;
use Illuminate\Http\Request;

// 1. Root redirect (default to Arabic 'ar')
Route::get('/', function () {
    return redirect('/ar');
});

// 2. Global Currency Switcher
Route::get('/currency/{code}', function ($code) {
    CurrencyService::set($code);
    return back();
})->name('currency.switch');

// 3. API Coupon Validator Endpoint
Route::post('/api/promo/validate', function (Request $request) {
    $code = strtoupper(trim($request->input('code', '')));
    $amount = (float)$request->input('order_amount', 0);

    if (empty($code)) {
        return response()->json(['success' => false, 'message' => 'يرجى إدخال كود الخصم'], 422);
    }

    $promo = Promotion::where('code', $code)->first();
    if (!$promo) {
        return response()->json(['success' => false, 'message' => 'كود الخصم غير موجود أو غير صالح'], 404);
    }

    $status = $promo->isValid($amount);
    if (!$status['valid']) {
        return response()->json(['success' => false, 'message' => $status['message']], 400);
    }

    $discount = $promo->calculateDiscount($amount);
    $finalAmount = max(0, $amount - $discount);

    return response()->json([
        'success' => true,
        'code' => $promo->code,
        'title' => app()->getLocale() === 'ar' ? $promo->title_ar : ($promo->title_en ?: $promo->title_ar),
        'discount_type' => $promo->discount_type,
        'discount_value' => (float)$promo->discount_value,
        'discount_amount' => round($discount, 2),
        'final_amount' => round($finalAmount, 2),
        'message' => 'تم تطبيق خصم بقيمة $' . number_format($discount, 2) . ' بنجاح!'
    ]);
})->name('api.promo.validate');

// 4. Localized Storefront Routes (ar | en)
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

    // Graceful Legacy .html & Alias Redirects (Zero 404s)
    Route::get('/customizer', function ($locale) { return redirect("/$locale/atelier"); });
    Route::get('/customizer.html', function ($locale) { return redirect("/$locale/atelier"); });
    Route::get('/atelier.html', function ($locale) { return redirect("/$locale/atelier"); });
    Route::get('/index.html', function ($locale) { return redirect("/$locale"); });
    Route::get('/collections.html', function ($locale) { return redirect("/$locale/collections"); });
    Route::get('/product.html', function ($locale) { return redirect("/$locale/collections"); });
    Route::get('/checkout.html', function ($locale) { return redirect("/$locale/checkout"); });
    Route::get('/account.html', function ($locale) { return redirect("/$locale/account"); });
    Route::get('/wishlist.html', function ($locale) { return redirect("/$locale/wishlist"); });
    Route::get('/about.html', function ($locale) { return redirect("/$locale/about"); });
});

// 5. Admin Authentication Public Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// 6. Admin Protected Management Routes
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Profile & Credentials
    Route::get('/profile', [AdminAuthController::class, 'showProfile'])->name('admin.profile');
    Route::post('/profile', [AdminAuthController::class, 'updateProfile'])->name('admin.profile.update');

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

    // Promotions & Discounts
    Route::get('/promotions', [PromotionManagerController::class, 'index'])->name('admin.promotions.index');
    Route::get('/promotions/create', [PromotionManagerController::class, 'create'])->name('admin.promotions.create');
    Route::post('/promotions', [PromotionManagerController::class, 'store'])->name('admin.promotions.store');
    Route::get('/promotions/{id}/edit', [PromotionManagerController::class, 'edit'])->name('admin.promotions.edit');
    Route::put('/promotions/{id}', [PromotionManagerController::class, 'update'])->name('admin.promotions.update');
    Route::post('/promotions/{id}/toggle', [PromotionManagerController::class, 'toggle'])->name('admin.promotions.toggle');
    Route::delete('/promotions/{id}', [PromotionManagerController::class, 'destroy'])->name('admin.promotions.destroy');

    // Banners & Sliders
    Route::get('/banners', [BannerManagerController::class, 'index'])->name('admin.banners.index');
    Route::get('/banners/create', [BannerManagerController::class, 'create'])->name('admin.banners.create');
    Route::post('/banners', [BannerManagerController::class, 'store'])->name('admin.banners.store');
    Route::get('/banners/{id}/edit', [BannerManagerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('/banners/{id}', [BannerManagerController::class, 'update'])->name('admin.banners.update');
    Route::post('/banners/{id}/toggle', [BannerManagerController::class, 'toggle'])->name('admin.banners.toggle');
    Route::delete('/banners/{id}', [BannerManagerController::class, 'destroy'])->name('admin.banners.destroy');

    // Theme & Hero Design Customizer
    Route::get('/theme', [ThemeManagerController::class, 'index'])->name('admin.theme.index');
    Route::post('/theme', [ThemeManagerController::class, 'update'])->name('admin.theme.update');

    // About & Heritage Page Editor
    Route::get('/about', [AboutManagerController::class, 'index'])->name('admin.about.index');
    Route::post('/about', [AboutManagerController::class, 'update'])->name('admin.about.update');

    // Marketing & Tracking Pixels
    Route::get('/marketing', [MarketingManagerController::class, 'index'])->name('admin.marketing.index');
    Route::post('/marketing', [MarketingManagerController::class, 'update'])->name('admin.marketing.update');

    // Currency & Store Settings
    Route::get('/settings', [SettingManagerController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [SettingManagerController::class, 'update'])->name('admin.settings.update');
});
