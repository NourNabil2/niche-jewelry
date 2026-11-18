@extends('layouts.app')

@section('title', 'Atelier Admin & Order Management • NICH JEWELRY')

@section('content')
<div class="container" style="padding: 60px 0 100px;">
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 32px; border-bottom:1px solid #e6e6e6; padding-bottom: 20px;">
    <div>
      <span class="eyebrow">Atelier Management System</span>
      <h1 class="section-heading mt-1">Dar Niche Control Center</h1>
    </div>
    <div>
      <a href="{{ route('home', ['locale' => app()->getLocale() ?: 'ar']) }}" class="btn btn-outline btn-sm">&larr; Back to Storefront</a>
    </div>
  </div>

  <!-- Stats Grid -->
  <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 40px;">
    <div style="background:#fff; border:1px solid #e6e6e6; padding: 24px; border-radius:4px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">Active Catalog Pieces</span>
      <div style="font-family:var(--font-serif); font-size:36px; color:#1b1b1b; margin-top:8px;">{{ $productsCount }}</div>
      <div style="font-size:12px; color:#2e7d32; margin-top:4px;">✓ Synced with MySQL</div>
    </div>
    <div style="background:#fff; border:1px solid #e6e6e6; padding: 24px; border-radius:4px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">3D Atelier Charms</span>
      <div style="font-family:var(--font-serif); font-size:36px; color:#c59b3f; margin-top:8px;">{{ $charmsCount }}</div>
      <div style="font-size:12px; color:#777; margin-top:4px;">Letters, Symbols & Numbers</div>
    </div>
    <div style="background:#fff; border:1px solid #e6e6e6; padding: 24px; border-radius:4px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">Client Commissions</span>
      <div style="font-family:var(--font-serif); font-size:36px; color:#1b1b1b; margin-top:8px;">{{ $ordersCount }}</div>
      <div style="font-size:12px; color:#c59b3f; margin-top:4px;">Dual-Track Custom Orders</div>
    </div>
  </div>

  <!-- Recent Orders Table -->
  <div style="background:#fff; border:1px solid #e6e6e6; border-radius:4px; padding: 28px;">
    <h3 style="font-family:var(--font-serif); font-size:22px; margin-bottom: 18px;">Recent Atelier Commissions &amp; Orders</h3>
    @if($recentOrders->isEmpty())
      <div style="text-align:center; padding: 40px 0; color:#777;">
        <p>No orders recorded in MySQL database yet.</p>
        <p style="font-size:12px; margin-top:6px;">Custom orders created in the 3D Studio or Checkout will populate here.</p>
      </div>
    @else
      <table style="width:100%; border-collapse:collapse; text-align:left;">
        <thead>
          <tr style="border-bottom:1px solid #eee; font-size:12px; color:#777; text-transform:uppercase;">
            <th style="padding:10px;">Order #</th>
            <th style="padding:10px;">Client</th>
            <th style="padding:10px;">Total</th>
            <th style="padding:10px;">Payment</th>
            <th style="padding:10px;">Status</th>
            <th style="padding:10px;">Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentOrders as $order)
            <tr style="border-bottom:1px solid #f5f5f5; font-size:13px;">
              <td style="padding:12px 10px; font-weight:600;">{{ $order->order_number }}</td>
              <td style="padding:12px 10px;">{{ $order->customer_name }}</td>
              <td style="padding:12px 10px; color:#c59b3f; font-weight:600;">${{ number_format($order->total_amount, 2) }}</td>
              <td style="padding:12px 10px;">{{ strtoupper($order->payment_status) }}</td>
              <td style="padding:12px 10px;">{{ ucwords(str_replace('_', ' ', $order->fulfillment_status)) }}</td>
              <td style="padding:12px 10px; color:#888;">{{ $order->created_at->format('M d, Y') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
