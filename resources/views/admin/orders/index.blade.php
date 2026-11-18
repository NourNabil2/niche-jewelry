@extends('layouts.admin')

@section('page_title', 'طلبات وتفصيل المجوهرات')

@section('content')
  <div class="table-card">
    @if($orders->isEmpty())
      <div style="text-align:center; padding: 48px 0; color:#888;">
        <p>لا توجد طلبات مسجلة في قاعدة بيانات MySQL حالياً.</p>
      </div>
    @else
      <table>
        <thead>
          <tr>
            <th>رقم الطلب</th>
            <th>العميل</th>
            <th>رقم الهاتف</th>
            <th>المجموع بالدولار</th>
            <th>المجموع بالدينار</th>
            <th>حالة الدفع</th>
            <th>مرحلة الصياغة</th>
            <th>التاريخ</th>
            <th>إجراءات</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $o)
            <tr>
              <td style="font-weight:700; font-family:monospace;">{{ $o->order_number }}</td>
              <td>{{ $o->customer_name }}</td>
              <td style="direction:ltr; text-align:right;">{{ $o->customer_phone }}</td>
              <td style="font-weight:700; color:#c59b3f;">${{ number_format($o->total_amount, 2) }}</td>
              <td style="font-weight:600;">{{ number_format(\App\Services\CurrencyService::convertUsdToKwd($o->total_amount), 3) }} د.ك</td>
              <td>
                <span class="badge-status {{ $o->payment_status === 'paid' ? 'badge-paid' : 'badge-pending' }}">
                  {{ strtoupper($o->payment_status) }}
                </span>
              </td>
              <td>
                <span class="badge-status badge-review">
                  {{ ucwords(str_replace('_', ' ', $o->fulfillment_status)) }}
                </span>
              </td>
              <td style="color:#888;">{{ $o->created_at->format('M d, Y') }}</td>
              <td>
                <a href="{{ route('admin.orders.show', $o->id) }}" class="btn btn-outline btn-sm" style="padding:4px 10px; font-size:11px;">
                  معاينة الطلب
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  <div style="margin-top:20px;">
    {{ $orders->links() }}
  </div>
@endsection
