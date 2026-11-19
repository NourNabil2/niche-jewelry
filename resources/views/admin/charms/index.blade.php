@extends('layouts.admin')

@section('page_title', 'دلايات استوديو الصياغة 3D والتسعير')

@section('topbar_actions')
  <a href="{{ route('admin.charms.create') }}" class="btn btn-gold btn-sm">
    + إضافة دلاية 3D جديدة
  </a>
@endsection

@section('content')
  <div class="table-card">
    <table>
      <thead>
        <tr>
          <th>الأيقونة</th>
          <th>كود الدلاية</th>
          <th>الاسم</th>
          <th>الفئة</th>
          <th>السعر بالدولار ($)</th>
          <th>السعر بالدينار (KWD)</th>
          <th>الاتجاه المسموح</th>
          <th>الحالة بالاستوديو</th>
          <th>إجراءات</th>
        </tr>
      </thead>
      <tbody>
        @foreach($charms as $c)
          <tr>
            <td style="width:44px; text-align:center;">
              <img src="{{ asset($c->thumbnail_url ?: 'assets/charms/bee_gold.png') }}" alt="" style="width:36px; height:36px; object-fit:contain; border-radius:4px; background:#faf8f5; padding:2px; border:1px solid #e8e3d8;">
            </td>
            <td style="font-family:monospace; font-weight:700;">{{ $c->charm_code }}</td>
            <td>
              <div style="font-weight:700;">{{ $c->name_ar }}</div>
              <div style="font-size:11px; color:#888;">{{ $c->name_en }}</div>
            </td>
            <td>
              <span style="font-size:11px; background:#faf4e6; color:#8b661d; padding:3px 8px; border-radius:3px; text-transform:uppercase;">
                {{ $c->category }}
              </span>
            </td>
            <td style="font-weight:700; color:#c59b3f;">
              ${{ number_format($c->price, 2) }}
            </td>
            <td style="font-weight:600; color:#181715;">
              {{ number_format($c->price_kwd ?: \App\Services\CurrencyService::convertUsdToKwd($c->price), 3) }} د.ك
            </td>
            <td>
              @if($c->allow_upright)
                <span style="font-size:11px; color:#1b5e20; background:#e8f5e9; padding:2px 7px; border-radius:3px; font-weight:600;">
                  أفقي + معتدل ⇡
                </span>
              @else
                <span style="font-size:11px; color:#5d4037; background:#efebe9; padding:2px 7px; border-radius:3px; font-weight:600;">
                  أفقي فقط ↔ (يسار / يمين)
                </span>
              @endif
            </td>
            <td>
              <span style="color: {{ $c->is_active ? '#2e7d32' : '#c62828' }}; font-weight:600; font-size:12px;">
                {{ $c->is_active ? '✓ مفعلة بالدرج' : 'مخفية' }}
              </span>
            </td>
            <td>
              <div style="display:flex; gap:6px;">
                <a href="{{ route('admin.charms.edit', $c->id) }}" class="btn btn-outline btn-sm" style="padding:4px 8px; font-size:11px;">
                  تعديل
                </a>
                <form action="{{ route('admin.charms.destroy', $c->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الدلاية؟');">
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
    {{ $charms->links() }}
  </div>
@endsection
