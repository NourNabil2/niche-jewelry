@extends('layouts.admin')

@section('title', ($isEdit ? 'تعديل كود خصم' : 'إضافة كود خصم جديد') . ' • NICH JEWELRY')
@section('page_title', $isEdit ? 'تعديل كود الخصم: ' . $promotion->code : 'إضافة كود خصم جديد')

@section('content')
<div style="max-width: 760px;">
    <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.02);">
        
        @if($errors->any())
            <div style="background:#ffebee; color:#c62828; padding:12px 16px; border-radius:4px; margin-bottom:20px; font-size:13px;">
                @foreach($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ $isEdit ? route('admin.promotions.update', $promotion->id) : route('admin.promotions.store') }}" method="POST">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">رمز الكود (Coupon Code) *</label>
                    <input type="text" name="code" value="{{ old('code', $promotion->code) }}" required uppercase dir="ltr" placeholder="مثال: NICH15" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:monospace; font-weight:700; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نوع الخصم *</label>
                    <select name="discount_type" required style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                        <option value="percentage" {{ old('discount_type', $promotion->discount_type) === 'percentage' ? 'selected' : '' }}>نسبة مئوية (%)</option>
                        <option value="fixed_usd" {{ old('discount_type', $promotion->discount_type) === 'fixed_usd' ? 'selected' : '' }}>مبلغ ثابت بالدولار ($ USD)</option>
                        <option value="fixed_kwd" {{ old('discount_type', $promotion->discount_type) === 'fixed_kwd' ? 'selected' : '' }}>مبلغ ثابت بالدينار الكويتي (د.ك KWD)</option>
                    </select>
                </div>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">قيمة الخصم *</label>
                    <input type="number" step="0.01" name="discount_value" value="{{ old('discount_value', $promotion->discount_value) }}" required style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الحد الأقصى للخصم بالدولار ($) (اختياري للنسبة)</label>
                    <input type="number" step="0.01" name="max_discount_amount" value="{{ old('max_discount_amount', $promotion->max_discount_amount) }}" placeholder="مثال: 150" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">عنوان العرض بالعربية *</label>
                <input type="text" name="title_ar" value="{{ old('title_ar', $promotion->title_ar) }}" required placeholder="مثال: خصم 15% على تصاميم الصيف" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">عنوان العرض بالإنجليزية (اختياري)</label>
                <input type="text" name="title_en" value="{{ old('title_en', $promotion->title_en) }}" dir="ltr" placeholder="e.g. 15% Summer Atelier Privilege" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الحد الأدنى لقيمة الطلب ($)</label>
                    <input type="number" step="0.01" name="min_order_amount" value="{{ old('min_order_amount', $promotion->min_order_amount) }}" placeholder="0" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الحد الأقصى لمرات الاستخدام العامة</label>
                    <input type="number" name="usage_limit" value="{{ old('usage_limit', $promotion->usage_limit) }}" placeholder="اتركه فارغاً للاستخدام غير المحدود" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:24px;">
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">تاريخ بدء السريان (اختياري)</label>
                    <input type="datetime-local" name="starts_at" value="{{ old('starts_at', $promotion->starts_at ? $promotion->starts_at->format('Y-m-d\TH:i') : '') }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">تاريخ انتهاء السريان (اختياري)</label>
                    <input type="datetime-local" name="expires_at" value="{{ old('expires_at', $promotion->expires_at ? $promotion->expires_at->format('Y-m-d\TH:i') : '') }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $promotion->is_active) ? 'checked' : '' }} style="accent-color:#c59b3f; width:16px; height:16px;">
                    <span style="font-size:13.5px; font-weight:600; color:#181715;">تفعيل الكوبون وجعله جاهزاً للاستخدام الفوري بالمتجر</span>
                </label>
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center;">
                <a href="{{ route('admin.promotions.index') }}" style="color:#666; text-decoration:none; font-size:13px;">إلغاء والعودة</a>
                <button type="submit" class="btn btn-primary" style="padding:10px 28px;">
                    {{ $isEdit ? 'حفظ تعديلات الكوبون' : 'إنشاء وتفعيل الكوبون' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
