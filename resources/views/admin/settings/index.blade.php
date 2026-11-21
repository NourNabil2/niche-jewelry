@extends('layouts.admin')

@section('page_title', 'إعدادات العملة والمتجر')

@section('content')
  <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; max-width:760px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
      @csrf

      <h3 style="font-family:var(--font-serif); font-size:20px; margin:0 0 18px; border-bottom:1px solid #eee; padding-bottom:10px;">
        إعدادات العملة والتسعير للعميل الكويتي والخليجي
      </h3>

      <div style="margin-bottom:24px;">
        <label style="display:block; font-size:13px; font-weight:700; margin-bottom:8px;">العملة الافتراضية للمتجر (Default Currency):</label>
        <div style="display:flex; gap:24px;">
          <label style="display:inline-flex; align-items:center; gap:8px; font-size:14px; cursor:pointer;">
            <input type="radio" name="default_currency" value="KWD" {{ $currentCurrency === 'KWD' ? 'checked' : '' }}>
            <span><strong>الدينار الكويتي (KWD د.ك)</strong> — للجمهور الكويتي والخليجي</span>
          </label>
          <label style="display:inline-flex; align-items:center; gap:8px; font-size:14px; cursor:pointer;">
            <input type="radio" name="default_currency" value="USD" {{ $currentCurrency === 'USD' ? 'checked' : '' }}>
            <span><strong>الدولار الأمريكي (USD $)</strong> — للجمهور العالمي</span>
          </label>
        </div>
      </div>

      <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:20px; border-radius:4px; margin-bottom:24px;">
        <h4 style="margin:0 0 8px; font-size:13px;">معامل الصرف المعتمد حالياً:</h4>
        <p style="margin:0; font-size:13px; color:#555;">
          <strong>1 KWD = 3.25 USD</strong> &bull; <strong>1 USD = 0.308 KWD</strong><br>
          <span style="font-size:11.5px; color:#888;">(عند إضافة أو تعديل منتج، يمكن للمشرف تحديد السعر المباشر بالدينار أو تركه فارغاً للحساب التلقائي وفق هذا المعامل).</span>
        </p>
      </div>

      <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:20px; border-radius:4px; margin-bottom:28px;">
        <h4 style="margin:0 0 8px; font-size:13px;">أكواد الخصم الملكية النشطة:</h4>
        <div style="font-size:13px; color:#555;">
          • <strong style="color:var(--gold-deep);">NICH15</strong> : خصم 15% فوري على إجمالي السلة لجميع المقتنين الجدد.<br>
          • <strong style="color:var(--gold-deep);">ATELIER20</strong> : خصم 20% على الطلبات فوق $500.
        </div>
      </div>

      <!-- Atelier & 3D Studio Features -->
      <h3 style="font-family:var(--font-serif); font-size:20px; margin:32px 0 18px; border-bottom:1px solid #eee; padding-bottom:10px;">
        ميزات استوديو الصياغة ثلاثي الأبعاد (Atelier Controls)
      </h3>

      <div style="background:#faf8f5; border:1px solid #e8e3d8; padding:20px; border-radius:6px; margin-bottom:28px;">
        <label style="display:flex; align-items:flex-start; gap:12px; cursor:pointer;">
          <input type="checkbox" name="enable_laser_engraving" value="1" {{ !empty($enableLaserEngraving) ? 'checked' : '' }} style="margin-top:4px; width:18px; height:18px; accent-color:#c59b3f;">
          <div>
            <strong style="font-size:14px; color:#181715;">تفعيل خدمة النقش الداخلي بالليزر (3D Laser Engraving)</strong>
            <p style="margin:6px 0 0; font-size:12px; color:#666; line-height:1.6;">
              عند تفعيل هذا الخيار، تظهر خطوة النقش التذكاري بالليزر في شاشات الاستوديو مع المعاينة ثلاثية الأبعاد المقوسة بدقة على الجدار الداخلي للإسورة. إذا تم إلغاء تفعيل هذا الخيار، سيتم إخفاء الخطوة وشريط المعاينة وحساب النقش تلقائياً من صفحة الأتيليه لجميع العملاء فوراً.
            </p>
          </div>
        </label>
      </div>

      <div>
        <button type="submit" class="btn btn-gold" style="padding:12px 32px; font-size:13px;">
          حفظ إعدادات المتجر
        </button>
      </div>
    </form>
  </div>
@endsection
