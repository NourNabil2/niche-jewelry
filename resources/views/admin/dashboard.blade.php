@extends('layouts.admin')

@section('page_title', 'لوحة الإحصائيات ونشاط الأتيليه')

@section('content')
  <!-- Stats Grid -->
  <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 36px;">
    <div style="background:#fff; border:1px solid #e8e3d8; padding: 24px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">قطع الكتالوج النشطة</span>
      <div style="font-family:var(--font-serif); font-size:36px; color:#1b1b1b; margin-top:8px;">{{ $productsCount }}</div>
      <div style="font-size:12px; color:#2e7d32; margin-top:4px;">✓ متزامنة مع MySQL</div>
    </div>
    <div style="background:#fff; border:1px solid #e8e3d8; padding: 24px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">دلايات الـ 3D المعتمدة</span>
      <div style="font-family:var(--font-serif); font-size:36px; color:#c59b3f; margin-top:8px;">{{ $charmsCount }}</div>
      <div style="font-size:12px; color:#777; margin-top:4px;">رموز، بافيه، وأرقام</div>
    </div>
    <div style="background:#fff; border:1px solid #e8e3d8; padding: 24px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">طلبات التفصيل والشراء</span>
      <div style="font-family:var(--font-serif); font-size:36px; color:#1b1b1b; margin-top:8px;">{{ $ordersCount }}</div>
      <div style="font-size:12px; color:#c59b3f; margin-top:4px;">إسورة جلايدر المزدوجة</div>
    </div>
  </div>

  <!-- Recent Orders Table -->
  <div class="table-card">
    <div style="padding: 20px 24px; border-bottom: 1px solid #e8e3d8; display:flex; justify-content:space-between; align-items:center;">
      <h3 style="font-family:var(--font-serif); font-size:20px; margin:0;">أحدث طلبات وتصاميم العملاء</h3>
      <a href="{{ route('admin.orders.index') }}" class="btn btn-outline btn-sm">عرض كافة الطلبات ←</a>
    </div>
    
    @if($recentOrders->isEmpty())
      <div style="text-align:center; padding: 48px 0; color:#888;">
        <p>لا توجد طلبات مسجلة في قاعدة بيانات MySQL حالياً.</p>
      </div>
    @else
      <table>
        <thead>
          <tr>
            <th>رقم الطلب</th>
            <th>العميل</th>
            <th>القيمة بالدولار</th>
            <th>القيمة بالدينار الكويتي</th>
            <th>حالة الدفع</th>
            <th>مرحلة التصنيع</th>
            <th>التاريخ</th>
            <th>إجراء</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentOrders as $order)
            <tr>
              <td style="font-weight:700;">{{ $order->order_number }}</td>
              <td>{{ $order->customer_name }}</td>
              <td style="color:#c59b3f; font-weight:700;">${{ number_format($order->total_amount, 2) }}</td>
              <td style="color:#181715; font-weight:600;">{{ number_format(\App\Services\CurrencyService::convertUsdToKwd($order->total_amount), 3) }} د.ك</td>
              <td>
                <span class="badge-status {{ $order->payment_status === 'paid' ? 'badge-paid' : 'badge-pending' }}">
                  {{ strtoupper($order->payment_status) }}
                </span>
              </td>
              <td>
                <span class="badge-status badge-review">
                  {{ ucwords(str_replace('_', ' ', $order->fulfillment_status)) }}
                </span>
              </td>
              <td style="color:#888;">{{ $order->created_at->format('M d, Y') }}</td>
              <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-outline btn-sm" style="padding:4px 10px; font-size:11px;">
                  معاينة التفاصيل
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
