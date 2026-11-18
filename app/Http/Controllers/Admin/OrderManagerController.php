<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderManagerController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'fulfillment_status' => 'required|string',
            'payment_status' => 'required|string',
            'tracking_number' => 'nullable|string|max:100',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'تم تحديث حالة الطلب والتتبع بنجاح.');
    }
}
