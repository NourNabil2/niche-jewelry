@extends('layouts.admin')

@section('title', ($isEdit ? 'تعديل البانر' : 'إضافة بانر جديد') . ' • NICH JEWELRY')
@section('page_title', $isEdit ? 'تعديل البانر: ' . $banner->title_ar : 'إضافة بانر جديد')

@section('content')
<div style="max-width: 780px;">
    <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.02);">
        
        @if($errors->any())
            <div style="background:#ffebee; color:#c62828; padding:12px 16px; border-radius:4px; margin-bottom:20px; font-size:13px;">
                @foreach($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ $isEdit ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}" method="POST">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">موضع ظهور البانر (Placement) *</label>
                    <select name="placement" required style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                        <option value="hero" {{ old('placement', $banner->placement) === 'hero' ? 'selected' : '' }}>الهيرو الرئيسي (Hero Section)</option>
                        <option value="top_bar" {{ old('placement', $banner->placement) === 'top_bar' ? 'selected' : '' }}>الشريط الإعلاني العلوي (Top Announcement Bar)</option>
                        <option value="mid_banner" {{ old('placement', $banner->placement) === 'mid_banner' ? 'selected' : '' }}>بانر وسطي مميز (Mid Banner)</option>
                        <option value="popup_offer" {{ old('placement', $banner->placement) === 'popup_offer' ? 'selected' : '' }}>نافذة عرض ترويجي منبثقة (Popup Promo)</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">ترتيب العرض (Sort Order) *</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $banner->sort_order) }}" required min="0" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">العنوان الرئيسي بالعربية *</label>
                    <input type="text" name="title_ar" value="{{ old('title_ar', $banner->title_ar) }}" required style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">العنوان الرئيسي بالإنجليزية (اختياري)</label>
                    <input type="text" name="title_en" value="{{ old('title_en', $banner->title_en) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص الشارة الذهبية الصغيرة (Badge) - عربي</label>
                    <input type="text" name="badge_text_ar" value="{{ old('badge_text_ar', $banner->badge_text_ar) }}" placeholder="مثال: استوديو 3D ✦ ذهب 18K" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص الشارة الذهبية الصغيرة (Badge) - إنجليزي</label>
                    <input type="text" name="badge_text_en" value="{{ old('badge_text_en', $banner->badge_text_en) }}" dir="ltr" placeholder="e.g. 3D Atelier ✦ Solid 18K Gold" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الوصف التفصيلي أو العنوان الفرعي - عربي</label>
                <textarea name="subtitle_ar" rows="3" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">{{ old('subtitle_ar', $banner->subtitle_ar) }}</textarea>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الوصف التفصيلي أو العنوان الفرعي - إنجليزي</label>
                <textarea name="subtitle_en" rows="3" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">{{ old('subtitle_en', $banner->subtitle_en) }}</textarea>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">مسار أو رابط الصورة (Image URL)</label>
                    <input type="text" name="image_url" value="{{ old('image_url', $banner->image_url) }}" dir="ltr" placeholder="/images/products/panther-hero.png" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">رابط التوجيه عند النقر (Target URL)</label>
                    <input type="text" name="link_url" value="{{ old('link_url', $banner->link_url) }}" dir="ltr" placeholder="/studio أو /collections" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص زر الإجراء (CTA Button) - عربي</label>
                    <input type="text" name="button_text_ar" value="{{ old('button_text_ar', $banner->button_text_ar) }}" placeholder="مثال: صممي في استوديو الـ 3D" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص زر الإجراء (CTA Button) - إنجليزي</label>
                    <input type="text" name="button_text_en" value="{{ old('button_text_en', $banner->button_text_en) }}" dir="ltr" placeholder="e.g. Design in 3D Studio" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }} style="accent-color:#c59b3f; width:16px; height:16px;">
                    <span style="font-size:13.5px; font-weight:600; color:#181715;">تفعيل البانر وإظهاره فوراً في المتجر للزوار</span>
                </label>
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center;">
                <a href="{{ route('admin.banners.index') }}" style="color:#666; text-decoration:none; font-size:13px;">إلغاء والعودة</a>
                <button type="submit" class="btn btn-primary" style="padding:10px 28px;">
                    {{ $isEdit ? 'حفظ تعديلات البانر' : 'إنشاء البانر الإعلاني' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
