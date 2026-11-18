@extends('layouts.admin')

@section('page_title', 'لوحة الإحصائيات ونشاط الأتيليه')

@section('content')
  <!-- Stats Grid -->
  <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 16px; margin-bottom: 28px;">
    <div style="background:#fff; border:1px solid #e8e3d8; padding: 20px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">قطع الكتالوج</span>
      <div style="font-family:var(--font-serif); font-size:32px; color:#1b1b1b; margin-top:6px;">{{ $productsCount }}</div>
      <div style="font-size:11.5px; color:#2e7d32; margin-top:4px;">✓ متزامنة مع MySQL</div>
    </div>
    
    <div style="background:#fff; border:1px solid #e8e3d8; padding: 20px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">دلايات الـ 3D</span>
      <div style="font-family:var(--font-serif); font-size:32px; color:#c59b3f; margin-top:6px;">{{ $charmsCount }}</div>
      <div style="font-size:11.5px; color:#777; margin-top:4px;">رموز، أحرف، عرق لؤلؤ</div>
    </div>

    <div style="background:#fff; border:1px solid #e8e3d8; padding: 20px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">طلبات التفصيل</span>
      <div style="font-family:var(--font-serif); font-size:32px; color:#1b1b1b; margin-top:6px;">{{ $ordersCount }}</div>
      <div style="font-size:11.5px; color:#c59b3f; margin-top:4px;">إسورة جلايدر المزدوجة</div>
    </div>

    <div style="background:#fff; border:1px solid #e8e3d8; padding: 20px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">كوبونات الخصم</span>
      <div style="font-family:var(--font-serif); font-size:32px; color:#2e7d32; margin-top:6px;">{{ $promotionsCount }}</div>
      <div style="font-size:11.5px; color:#2e7d32; margin-top:4px;">عروض نشطة بالمتجر</div>
    </div>

    <div style="background:#fff; border:1px solid #e8e3d8; padding: 20px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">البانرات النشطة</span>
      <div style="font-family:var(--font-serif); font-size:32px; color:#1565c0; margin-top:6px;">{{ $bannersCount }}</div>
      <div style="font-size:11.5px; color:#1565c0; margin-top:4px;">الهيرو والشريط العلوي</div>
    </div>

    <div style="background:#fff; border:1px solid #e8e3d8; padding: 20px; border-radius:6px;">
      <span style="font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#777;">حجم المبيعات التقديري</span>
      <div style="font-family:var(--font-serif); font-size:28px; color:#c59b3f; margin-top:6px;">${{ number_format($totalSales, 0) }}</div>
      <div style="font-size:11.5px; color:#777; margin-top:4px;">{{ number_format(\App\Services\CurrencyService::convertUsdToKwd($totalSales), 1) }} د.ك</div>
    </div>
  </div>

  <!-- Quick Atelier Hub Navigation -->
  <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin-bottom: 28px;">
    <a href="{{ route('admin.theme.index') }}" style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:18px; text-decoration:none; color:inherit; display:flex; align-items:center; gap:14px; transition:border-color 0.2s;">
      <span style="font-size:24px;">🎨</span>
      <div>
        <div style="font-weight:700; font-size:14px; color:#181715;">تخصيص الهيرو والواجهة</div>
        <div style="font-size:11.5px; color:#888;">تعديل نصوص وبانرات المتجر الحي</div>
      </div>
    </a>

    <a href="{{ route('admin.promotions.index') }}" style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:18px; text-decoration:none; color:inherit; display:flex; align-items:center; gap:14px; transition:border-color 0.2s;">
      <span style="font-size:24px;">🏷️</span>
      <div>
        <div style="font-weight:700; font-size:14px; color:#181715;">العروض وكوبونات الخصم</div>
        <div style="font-size:11.5px; color:#888;">إنشاء وتعديل أكواد الخصم والنسب</div>
      </div>
    </a>

    <a href="{{ route('admin.marketing.index') }}" style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:18px; text-decoration:none; color:inherit; display:flex; align-items:center; gap:14px; transition:border-color 0.2s;">
      <span style="font-size:24px;">🎯</span>
      <div>
        <div style="font-weight:700; font-size:14px; color:#181715;">ربط البيكسل والإعلانات</div>
        <div style="font-size:11.5px; color:#888;">Meta Pixel, TikTok, Snapchat, GA4</div>
      </div>
    </a>

    <a href="{{ route('admin.about.index') }}" style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:18px; text-decoration:none; color:inherit; display:flex; align-items:center; gap:14px; transition:border-color 0.2s;">
      <span style="font-size:24px;">📜</span>
      <div>
        <div style="font-weight:700; font-size:14px; color:#181715;">قصة الدار والحرفية</div>
        <div style="font-size:11.5px; color:#888;">تعديل قصة الأتيليه ودليل المقاسات</div>
      </div>
    </a>
  </div>

  <!-- Recent Orders Table -->
  <div class="table-card">
    <div style="padding: 18px 24px; border-bottom: 1px solid #e8e3d8; display:flex; justify-content:space-between; align-items:center;">
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
