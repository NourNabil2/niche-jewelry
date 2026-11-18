@extends('layouts.admin')

@section('title', 'إدارة العروض وكوبونات الخصم • NICH JEWELRY')
@section('page_title', 'العروض وكوبونات الخصم')

@section('topbar_actions')
    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary" style="padding: 9px 18px; font-size:13px; text-decoration:none;">
      + إضافة كود خصم جديد
    </a>
@endsection

@section('content')
<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>كود الخصم</th>
                <th>عنوان العرض</th>
                <th>نوع وقيمة الخصم</th>
                <th>الحد الأدنى للطلب</th>
                <th>مرات الاستخدام</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($promotions as $promo)
                <tr>
                    <td style="font-weight:700; font-family:monospace; font-size:14px; color:#c59b3f;">
                        {{ $promo->code }}
                    </td>
                    <td>
                        <div style="font-weight:600; color:#181715;">{{ $promo->title_ar }}</div>
                        @if($promo->title_en)
                            <div style="font-size:11px; color:#888;">{{ $promo->title_en }}</div>
                        @endif
                    </td>
                    <td>
                        @if($promo->discount_type === 'percentage')
                            <span style="font-weight:700; color:#2e7d32; font-size:14px;">{{ $promo->discount_value }}%</span>
                            @if($promo->max_discount_amount)
                                <span style="font-size:11px; color:#888;">(حد أقصى ${{ $promo->max_discount_amount }})</span>
                            @endif
                        @elseif($promo->discount_type === 'fixed_usd')
                            <span style="font-weight:700; color:#1565c0; font-size:14px;">${{ number_format($promo->discount_value, 2) }}</span>
                        @else
                            <span style="font-weight:700; color:#1565c0; font-size:14px;">{{ number_format($promo->discount_value, 3) }} د.ك</span>
                        @endif
                    </td>
                    <td>
                        @if($promo->min_order_amount > 0)
                            ${{ number_format($promo->min_order_amount, 2) }}
                        @else
                            <span style="color:#888;">بلا حد أدنى</span>
                        @endif
                    </td>
                    <td>
                        {{ $promo->used_count }} / {{ $promo->usage_limit ?: '∞' }}
                    </td>
                    <td>
                        @if($promo->is_active)
                            <span class="badge-status badge-paid">مفعّل ✓</span>
                        @else
                            <span class="badge-status badge-pending">معطّل ✗</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <form action="{{ route('admin.promotions.toggle', $promo->id) }}" method="POST" style="margin:0;">
                                @csrf
                                <button type="submit" style="background:none; border:1px solid #d4cdbf; border-radius:3px; padding:4px 8px; font-size:11px; cursor:pointer; color:#444;">
                                    {{ $promo->is_active ? 'تعطيل' : 'تفعيل' }}
                                </button>
                            </form>
                            <a href="{{ route('admin.promotions.edit', $promo->id) }}" style="color:#c59b3f; font-weight:600; font-size:12px; text-decoration:none; padding:4px 8px; border:1px solid #c59b3f; border-radius:3px;">
                                تعديل
                            </a>
                            <form action="{{ route('admin.promotions.destroy', $promo->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا الكوبون؟');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:1px solid #e57373; color:#c62828; border-radius:3px; padding:4px 8px; font-size:11px; cursor:pointer;">
                                    حذف
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:32px; color:#888;">
                        لا توجد كوبونات خصم حالياً. اضغط على "إضافة كود خصم جديد" لإنشاء أول عرض.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:20px;">
    {{ $promotions->links() }}
</div>
@endsection
