@extends('layouts.admin')

@section('page_title', 'مجوهرات الكتالوج والأسعار')

@section('topbar_actions')
  <a href="{{ route('admin.products.create') }}" class="btn btn-gold btn-sm">
    + إضافة قطعة مجوهرات جديدة
  </a>
@endsection

@section('content')
  <div class="table-card">
    <table>
      <thead>
        <tr>
          <th>الصورة</th>
          <th>اسم القطعة</th>
          <th>التصنيف</th>
          <th>السعر بالدولار ($)</th>
          <th>السعر بالدينار (KWD)</th>
          <th>المخزون</th>
          <th>مميز</th>
          <th>إجراءات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $p)
          <tr>
            <td style="width:50px;">
              <img src="{{ asset($p->images[0] ?? 'assets/images/bangle_gold_studio.jpg') }}" alt="" style="width:44px; height:44px; object-fit:cover; border-radius:4px; border:1px solid #e8e3d8;">
            </td>
            <td>
              <div style="font-weight:700;">{{ $p->title_ar }}</div>
              <div style="font-size:11px; color:#888;">{{ $p->title_en }}</div>
            </td>
            <td>
              <span style="font-size:11px; background:#faf4e6; color:#8b661d; padding:3px 8px; border-radius:3px; text-transform:uppercase;">
                {{ $p->category }}
              </span>
            </td>
            <td style="font-weight:700; color:#c59b3f;">
              ${{ number_format($p->base_price, 2) }}
            </td>
            <td style="font-weight:600; color:#181715;">
              {{ number_format($p->price_kwd ?: \App\Services\CurrencyService::convertUsdToKwd($p->base_price), 3) }} د.ك
            </td>
            <td>
              <span style="color: {{ $p->in_stock ? '#2e7d32' : '#c62828' }}; font-weight:600; font-size:12px;">
                {{ $p->in_stock ? 'متوفر' : 'غير متوفر' }}
              </span>
            </td>
            <td>
              <span style="font-size:12px;">{{ $p->is_featured ? '⭐ نعم' : '—' }}</span>
            </td>
            <td>
              <div style="display:flex; gap:6px;">
                <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-outline btn-sm" style="padding:4px 8px; font-size:11px;">
                  تعديل
                </a>
                <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه القطعة؟');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm" style="background:#ffebee; color:#c62828; border:1px solid #ffcdd2; padding:4px 8px; font-size:11px; cursor:pointer;">
                    حذف
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;">
    {{ $products->links() }}
  </div>
@endsection
