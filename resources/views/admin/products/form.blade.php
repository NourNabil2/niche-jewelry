@extends('layouts.admin')

@section('page_title', $product->exists ? 'تعديل قطعة المجوهرات: ' . $product->title_ar : 'إضافة قطعة مجوهرات راقية جديدة')

@section('topbar_actions')
  <a href="{{ route('admin.products.index') }}" class="btn btn-outline btn-sm">
    &rarr; العودة لقائمة المنتجات
  </a>
@endsection

@section('content')
  <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; max-width:860px;">
    <form action="{{ $product->exists ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST">
      @csrf
      @if($product->exists)
        @method('PUT')
      @endif

      <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الاسم بالعربية *</label>
          <input type="text" name="title_ar" value="{{ old('title_ar', $product->title_ar) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الاسم بالإنجليزية (Title EN) *</label>
          <input type="text" name="title_en" value="{{ old('title_en', $product->title_en) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;">
        </div>
      </div>

      <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:20px; margin-bottom:20px;">
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">المعرّف الفريد (Slug) *</label>
          <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="مثال: glider-diamond-cuff">
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">التصنيف *</label>
          <select name="category" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
            <option value="bangles" {{ old('category', $product->category) === 'bangles' ? 'selected' : '' }}>أساور جلايدر (Bangles)</option>
            <option value="charms" {{ old('category', $product->category) === 'charms' ? 'selected' : '' }}>دلايات جلايدر (Charms)</option>
            <option value="necklaces" {{ old('category', $product->category) === 'necklaces' ? 'selected' : '' }}>قلائد وسلاسل (Necklaces)</option>
            <option value="earrings" {{ old('category', $product->category) === 'earrings' ? 'selected' : '' }}>أقراط بافيه (Earrings)</option>
            <option value="rings" {{ old('category', $product->category) === 'rings' ? 'selected' : '' }}>خواتم متراصة (Rings)</option>
          </select>
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">المعدن الأساسي</label>
          <select name="material" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
            <option value="14k_gold" {{ old('material', $product->material) === '14k_gold' ? 'selected' : '' }}>ذهب أصفر 18K (18K Yellow Gold)</option>
            <option value="sterling_silver" {{ old('material', $product->material) === 'sterling_silver' ? 'selected' : '' }}>فضة إسترليني 925 (925 Silver)</option>
            <option value="rose_gold" {{ old('material', $product->material) === 'rose_gold' ? 'selected' : '' }}>ذهب وردي 18K (18K Rose Gold)</option>
          </select>
        </div>
      </div>

      <!-- Pricing Row (USD & KWD) -->
      <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:20px; border-radius:6px; margin-bottom:20px;">
        <h4 style="margin:0 0 14px; font-size:14px; color:#181715;">تسعير القطعة بالعملات (USD / KWD):</h4>
        <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:20px;">
          <div>
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">السعر بالدولار ($ USD) *</label>
            <input type="number" step="0.01" name="base_price" value="{{ old('base_price', $product->base_price) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;">
          </div>
          <div>
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">السعر بالدينار الكويتي (KWD د.ك)</label>
            <input type="number" step="0.001" name="price_kwd" value="{{ old('price_kwd', $product->price_kwd) }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="اتركه فارغاً للحساب التلقائي">
          </div>
          <div>
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">السعر قبل الخصم ($ USD)</label>
            <input type="number" step="0.01" name="compare_price" value="{{ old('compare_price', $product->compare_price) }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="اختياري">
          </div>
        </div>
      </div>

      <div style="margin-bottom:20px;">
        <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">مسار أو رابط الصورة الرئيسية (Image URL)</label>
        <input type="text" name="image_url" value="{{ old('image_url', $product->images[0] ?? '') }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="assets/images/bangle_gold_studio.jpg">
      </div>

      <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:24px;">
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الوصف بالعربية</label>
          <textarea name="description_ar" rows="4" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">{{ old('description_ar', $product->description_ar) }}</textarea>
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الوصف بالإنجليزية (Description EN)</label>
          <textarea name="description_en" rows="4" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;">{{ old('description_en', $product->description_en) }}</textarea>
        </div>
      </div>

      <div style="display:flex; gap:24px; margin-bottom:30px;">
        <label style="display:inline-flex; align-items:center; gap:8px; font-size:13px; cursor:pointer;">
          <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
          <span>إظهار في قسم "الأكثر طلباً ومبيعاً" بالصفحة الرئيسية</span>
        </label>
        <label style="display:inline-flex; align-items:center; gap:8px; font-size:13px; cursor:pointer;">
          <input type="checkbox" name="in_stock" value="1" {{ old('in_stock', $product->exists ? $product->in_stock : true) ? 'checked' : '' }}>
          <span>القطعة متوفرة بالمخزون وجاهزة للصياغة</span>
        </label>
      </div>

      <div>
        <button type="submit" class="btn btn-gold" style="padding:12px 32px; font-size:13px;">
          {{ $product->exists ? 'حفظ التعديلات وتحديث الأسعار' : 'إضافة القطعة إلى المتجر' }}
        </button>
      </div>
    </form>
  </div>
@endsection
