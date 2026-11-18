<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:191',
            'customer_email' => 'required|email|max:191',
            'customer_phone' => 'required|string|max:50',
            'shipping_address' => 'required|string',
            'cart_items' => 'required|array',
            'total_amount' => 'required|numeric',
        ]);

        $orderNumber = 'NICH-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'shipping_address' => ['address' => $validated['shipping_address']],
            'subtotal' => $validated['total_amount'],
            'total_amount' => $validated['total_amount'],
            'payment_status' => 'pending',
            'fulfillment_status' => 'design_review',
        ]);

        foreach ($validated['cart_items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_type' => $item['type'] ?? 'product',
                'title' => $item['title'] ?? 'Jewelry Piece',
                'price' => $item['price'] ?? 0,
                'quantity' => $item['qty'] ?? 1,
                'customization_details' => $item['customization'] ?? null,
            ]);
        }

        return response()->json([
            'success' => true,
            'order_number' => $order->order_number,
        ]);
    }
}
