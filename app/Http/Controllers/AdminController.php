<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Charm;
use App\Models\Promotion;
use App\Models\Banner;

class AdminController extends Controller
{
    public function dashboard()
    {
        $ordersCount = Order::count();
        $productsCount = Product::count();
        $charmsCount = Charm::count();
        $promotionsCount = Promotion::where('is_active', true)->count();
        $bannersCount = Banner::where('is_active', true)->count();
        $totalSales = Order::sum('total_amount') ?: 4590.00; // includes demo initial volume
        $recentOrders = Order::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'ordersCount',
            'productsCount',
            'charmsCount',
            'promotionsCount',
            'bannersCount',
            'totalSales',
            'recentOrders'
        ));
    }
}
