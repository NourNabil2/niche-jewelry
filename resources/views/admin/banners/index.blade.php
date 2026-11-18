@extends('layouts.admin')

@section('title', 'إدارة البانرات والشرائح الترويجية • NICH JEWELRY')
@section('page_title', 'البانرات والشرائح الترويجية')

@section('topbar_actions')
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary" style="padding: 9px 18px; font-size:13px; text-decoration:none;">
      + إضافة بانر إعلاني جديد
    </a>
@endsection

@section('content')
<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>الموضع</th>
                <th>عنوان البانر</th>
                <th>الصورة المرفقة</th>
                <th>الرابط وزر الإجراء</th>
                <th>الترتيب</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($banners as $banner)
                <tr>
                    <td>
                        @if($banner->placement === 'hero')
                            <span class="badge-status" style="background:#fff8e1; color:#f57f17;">الهيرو الرئيسي (Hero)</span>
                        @elseif($banner->placement === 'top_bar')
                            <span class="badge-status" style="background:#e8eaf6; color:#283593;">الشريط العلوي (Top Bar)</span>
                        @elseif($banner->placement === 'mid_banner')
                            <span class="badge-status" style="background:#f3e5f5; color:#6a1b9a;">بانر وسطي (Mid Banner)</span>
                        @else
                            <span class="badge-status" style="background:#e0f2f1; color:#00695c;">نافذة منبثقة (Popup)</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-weight:700; color:#181715;">{{ $banner->title_ar }}</div>
                        @if($banner->subtitle_ar)
                            <div style="font-size:12px; color:#666; margin-top:2px;">{{ Str::limit($banner->subtitle_ar, 60) }}</div>
                        @endif
                    </td>
                    <td>
                        @if($banner->image_url)
                            <img src="{{ asset($banner->image_url) }}" alt="Preview" style="width:60px; height:38px; object-fit:cover; border-radius:3px; border:1px solid #ddd;">
                        @else
                            <span style="color:#aaa; font-size:11px;">بدون صورة</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-size:12px; color:#333;">{{ $banner->button_text_ar ?: 'بدون زر' }}</div>
                        @if($banner->link_url)
                            <a href="{{ $banner->link_url }}" target="_blank" style="font-size:11px; color:#c59b3f; text-decoration:none;">{{ Str::limit($banner->link_url, 25) }} ⇱</a>
                        @endif
                    </td>
                    <td style="font-weight:600;">
                        {{ $banner->sort_order }}
                    </td>
                    <td>
                        @if($banner->is_active)
                            <span class="badge-status badge-paid">نشط ومرئي ✓</span>
                        @else
                            <span class="badge-status badge-pending">مخفي ✗</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <form action="{{ route('admin.banners.toggle', $banner->id) }}" method="POST" style="margin:0;">
                                @csrf
                                <button type="submit" style="background:none; border:1px solid #d4cdbf; border-radius:3px; padding:4px 8px; font-size:11px; cursor:pointer; color:#444;">
                                    {{ $banner->is_active ? 'إخفاء' : 'إظهار' }}
                                </button>
                            </form>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" style="color:#c59b3f; font-weight:600; font-size:12px; text-decoration:none; padding:4px 8px; border:1px solid #c59b3f; border-radius:3px;">
                                تعديل
                            </a>
                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا البانر؟');" style="margin:0;">
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
                        لا توجد بانرات مسجلة.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
