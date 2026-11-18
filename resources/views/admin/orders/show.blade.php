@extends('layouts.admin')

@section('page_title', 'تفاصيل الطلب: ' . $order->order_number)

@section('topbar_actions')
  <a href="{{ route('admin.orders.index') }}" class="btn btn-outline btn-sm">
    &rarr; العودة لقائمة الطلبات
  </a>
@endsection

@section('content')
  <div style="display:grid; grid-template-columns: 2fr 1fr; gap:28px;">
    <!-- Order Items & Customization Details -->
    <div>
      <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:28px; margin-bottom:28px;">
        <h3 style="font-family:var(--font-serif); font-size:20px; margin:0 0 18px; border-bottom:1px solid #eee; padding-bottom:10px;">
          القطع المطلوبة في هذا الطلب
        </h3>

        @foreach($order->items as $item)
          <div style="display:flex; justify-content:space-between; align-items:flex-start; padding:18px 0; border-bottom:1px solid #f5f5f5;">
            <div>
              <div style="font-size:15px; font-weight:700; color:#181715;">{{ $item->title }}</div>
              <div style="font-size:12px; color:#888; margin-top:4px;">الكمية: {{ $item->quantity }} &bull; النوع: {{ $item->item_type }}</div>
              
              @if(!empty($item->customization_details))
                <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:12px; border-radius:4px; margin-top:10px; font-size:12.5px;">
                  <strong style="color:var(--gold-deep); display:block; margin-bottom:6px;">✦ مواصفات وتخصيص الأتيليه 3D:</strong>
                  @if(!empty($item->customization_details['engraving']))
                    <div>• <strong>النقش الداخلي:</strong> {{ $item->customization_details['engraving'] }}</div>
                  @endif
                  @if(!empty($item->customization_details['metal']))
                    <div>• <strong>المعدن المختار:</strong> {{ $item->customization_details['metal'] }}</div>
                  @endif
                  @if(!empty($item->customization_details['front_track']))
                    <div>• <strong>دلايات الوجه الأمامي:</strong> {{ implode(', ', (array)$item->customization_details['front_track']) }}</div>
                  @endif
                  @if(!empty($item->customization_details['back_track']))
                    <div>• <strong>دلايات الوجه الخلفي:</strong> {{ implode(', ', (array)$item->customization_details['back_track']) }}</div>
                  @endif
                </div>
              @endif
            </div>
            <div style="text-align:left;">
              <div style="font-size:16px; font-weight:700; color:#c59b3f;">${{ number_format($item->price, 2) }}</div>
              <div style="font-size:12px; color:#777;">{{ number_format(\App\Services\CurrencyService::convertUsdToKwd($item->price), 3) }} د.ك</div>
            </div>
          </div>
        @endforeach

        <div style="display:flex; justify-content:space-between; align-items:center; padding-top:20px; font-size:18px; font-weight:700;">
          <span>المجموع الإجمالي للطلب:</span>
          <div style="text-align:left;">
            <span style="color:#c59b3f;">${{ number_format($order->total_amount, 2) }}</span>
            <span style="font-size:14px; color:#777; margin-right:8px;">({{ number_format(\App\Services\CurrencyService::convertUsdToKwd($order->total_amount), 3) }} د.ك)</span>
          </div>
        </div>
      </div>

      <!-- Customer Details -->
      <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:24px;">
        <h3 style="font-family:var(--font-serif); font-size:18px; margin:0 0 14px; border-bottom:1px solid #eee; padding-bottom:8px;">
          بيانات العميل وعنوان الشحن
        </h3>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:14px; font-size:13.5px;">
          <div><strong>الاسم:</strong> {{ $order->customer_name }}</div>
          <div><strong>البريد:</strong> {{ $order->customer_email }}</div>
          <div><strong>رقم الهاتف:</strong> {{ $order->customer_phone }}</div>
          <div><strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</div>
        </div>
        <div style="margin-top:14px; font-size:13.5px;">
          <strong>عنوان التوصيل:</strong>
          <div style="background:#faf8f5; padding:10px; border-radius:4px; margin-top:6px; border:1px solid #e8e3d8;">
            {{ is_array($order->shipping_address) ? ($order->shipping_address['address'] ?? json_encode($order->shipping_address, JSON_UNESCAPED_UNICODE)) : $order->shipping_address }}
          </div>
        </div>
      </div>
    </div>

    <!-- Fulfillment Status Updater Sidebar -->
    <div>
      <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:24px;">
        <h3 style="font-family:var(--font-serif); font-size:18px; margin:0 0 16px; border-bottom:1px solid #eee; padding-bottom:8px;">
          تحديث حالة الطلب والشحن
        </h3>

        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">مرحلة الصياغة والتنفيذ:</label>
            <select name="fulfillment_status" style="width:100%; padding:9px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
              <option value="design_review" {{ $order->fulfillment_status === 'design_review' ? 'selected' : '' }}>1. مراجعة التصميم الـ 3D (Design Review)</option>
              <option value="casting_assembly" {{ $order->fulfillment_status === 'casting_assembly' ? 'selected' : '' }}>2. الصب والتجميع الحرفي (In Casting)</option>
              <option value="hallmarked" {{ $order->fulfillment_status === 'hallmarked' ? 'selected' : '' }}>3. دمغ العيار والضمان (Hallmarked)</option>
              <option value="shipped" {{ $order->fulfillment_status === 'shipped' ? 'selected' : '' }}>4. تم الشحن المؤمّن (Shipped)</option>
              <option value="delivered" {{ $order->fulfillment_status === 'delivered' ? 'selected' : '' }}>5. تم التسليم للعميل (Delivered)</option>
            </select>
          </div>

          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">حالة الدفع:</label>
            <select name="payment_status" style="width:100%; padding:9px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
              <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>قيد الانتظار (Pending)</option>
              <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>تم الدفع بنجاح (Paid)</option>
              <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>فشلت عملية الدفع (Failed)</option>
            </select>
          </div>

          <div style="margin-bottom:20px;">
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">رقم تتبع الشحنة (Tracking #):</label>
            <input type="text" name="tracking_number" value="{{ old('tracking_number', $order->tracking_number) }}" style="width:100%; padding:9px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="مثال: DHL-84920491">
          </div>

          <button type="submit" class="btn btn-gold" style="width:100%; justify-content:center; padding:10px;">
            حفظ وتحديث حالة الطلب
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
