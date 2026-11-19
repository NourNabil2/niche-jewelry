@extends('layouts.admin')

@section('page_title', $charm->exists ? 'تعديل دلاية الـ 3D: ' . $charm->name_ar : 'إضافة دلاية 3D جديدة للأتيليه')

@section('topbar_actions')
  <a href="{{ route('admin.charms.index') }}" class="btn btn-outline btn-sm">
    &rarr; العودة لقائمة الدلايات
  </a>
@endsection

@section('content')
  <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; max-width:800px;">
    <form action="{{ $charm->exists ? route('admin.charms.update', $charm->id) : route('admin.charms.store') }}" method="POST">
      @csrf
      @if($charm->exists)
        @method('PUT')
      @endif

      <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الاسم بالعربية *</label>
          <input type="text" name="name_ar" value="{{ old('name_ar', $charm->name_ar) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الاسم بالإنجليزية (Name EN) *</label>
          <input type="text" name="name_en" value="{{ old('name_en', $charm->name_en) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;">
        </div>
      </div>

      <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:20px; margin-bottom:20px;">
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">كود الدلاية (Charm Code) *</label>
          <input type="text" name="charm_code" value="{{ old('charm_code', $charm->charm_code) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="مثال: palm_tree">
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">الفئة *</label>
          <select name="category" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
            <option value="symbols" {{ old('category', $charm->category) === 'symbols' ? 'selected' : '' }}>رموز وأيقونات (Symbols)</option>
            <option value="letters" {{ old('category', $charm->category) === 'letters' ? 'selected' : '' }}>حروف مرصعة بالماس بافيه (Letters)</option>
            <option value="numbers" {{ old('category', $charm->category) === 'numbers' ? 'selected' : '' }}>أرقام الحظ (Numbers)</option>
            <option value="custom" {{ old('category', $charm->category) === 'custom' ? 'selected' : '' }}>دلايات خاصة مخصصة (Custom)</option>
          </select>
        </div>
        <div>
          <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">نوع المجسم 3D *</label>
          <select name="mesh_type" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit;">
            <option value="parametric" {{ old('mesh_type', $charm->mesh_type) === 'parametric' ? 'selected' : '' }}>مجسم بارامتري نافر (Parametric)</option>
            <option value="cutout_mesh" {{ old('mesh_type', $charm->mesh_type) === 'cutout_mesh' ? 'selected' : '' }}>مجسم مفرغ بافيه (Cutout Mesh)</option>
            <option value="extruded_png" {{ old('mesh_type', $charm->mesh_type) === 'extruded_png' ? 'selected' : '' }}>تجسيم صورة مفرغة (Extruded PNG)</option>
          </select>
        </div>
      </div>

      <!-- Pricing Row (USD & KWD) -->
      <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:20px; border-radius:6px; margin-bottom:20px;">
        <h4 style="margin:0 0 14px; font-size:14px; color:#181715;">تسعير الدلاية بالعملات (USD / KWD):</h4>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
          <div>
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">السعر بالدولار ($ USD) *</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $charm->price) }}" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;">
          </div>
          <div>
            <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">السعر بالدينار الكويتي (KWD د.ك)</label>
            <input type="number" step="0.001" name="price_kwd" value="{{ old('price_kwd', $charm->price_kwd) }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="اتركه فارغاً للحساب التلقائي">
          </div>
        </div>
      </div>

      <!-- Upright Orientation Lock (Direction Control) -->
      <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:16px 20px; border-radius:6px; margin-bottom:20px;">
        <label style="display:flex; align-items:flex-start; gap:10px; font-size:13px; cursor:pointer;">
          <input type="checkbox" name="allow_upright" value="1" {{ old('allow_upright', $charm->exists ? $charm->allow_upright : false) ? 'checked' : '' }} style="margin-top:3px; accent-color:#c59b3f;">
          <div>
            <strong style="color:#181715;">السماح بالوضع المعتدل / الرأسي (Allow Upright 0°)</strong>
            <p style="margin:4px 0 0; font-size:11.5px; color:#787268; line-height:1.5;">
              الوضع الافتراضي معطّل ومقفل: جميع الدلايات والحروف تظهر أفقياً فقط (يمين ↷ أو يسار ↶). فعّل هذا الخيار فقط إذا كنت تريد السماح للعميل بتوجيه هذه الدلاية عمودياً في الاستوديو.
            </p>
          </div>
        </label>
      </div>

      <div style="margin-bottom:24px;">
        <label style="display:block; font-size:12px; font-weight:700; margin-bottom:6px;">مسار أو رابط أيقونة الدلاية (PNG مفرغة)</label>
        <input type="text" name="thumbnail_url" value="{{ old('thumbnail_url', $charm->thumbnail_url) }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; font-family:inherit; direction:ltr;" placeholder="assets/charms/bee_gold.png">
      </div>

      <div style="margin-bottom:30px;">
        <label style="display:inline-flex; align-items:center; gap:8px; font-size:13px; cursor:pointer;">
          <input type="checkbox" name="is_active" value="1" {{ old('is_active', $charm->exists ? $charm->is_active : true) ? 'checked' : '' }}>
          <span>الدلاية مفعلة وتظهر في أدراج استوديو الـ 3D لجميع العملاء</span>
        </label>
      </div>

      <div>
        <button type="submit" class="btn btn-gold" style="padding:12px 32px; font-size:13px;">
          {{ $charm->exists ? 'حفظ تعديلات الدلاية' : 'إضافة الدلاية للاستوديو' }}
        </button>
      </div>
    </form>
  </div>
@endsection
