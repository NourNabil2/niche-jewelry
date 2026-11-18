<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Charm;

class AdminController extends Controller
{
    public function dashboard()
    {
        $ordersCount = Order::count();
        $productsCount = Product::count();
        $charmsCount = Charm::count();
        $recentOrders = Order::latest()->take(10)->get();

        return view('admin.dashboard', compact('ordersCount', 'productsCount', 'charmsCount', 'recentOrders'));
    }
}
