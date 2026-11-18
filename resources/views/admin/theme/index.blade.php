@extends('layouts.admin')

@section('title', 'تخصيص تصميم المتجر والبانرات • NICH JEWELRY')
@section('page_title', 'تخصيص تصميم المتجر والبانر الرئيسي')

@section('content')
<div style="max-width: 860px;">
    <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.02);">
        
        <p style="font-size:13.5px; color:#666; margin-top:0; margin-bottom:28px; line-height:1.6;">
            تحكم كامل في نصوص وعناصر الواجهة الرئيسية للمتجر (Hero Banner)، الشريط الإعلاني العلوي، والفوتر دون الحاجة لأي تعديل في الأكواد. التعديلات تنعكس فوراً على المتجر الحي للزوار.
        </p>

        <form action="{{ route('admin.theme.update') }}" method="POST">
            @csrf

            <!-- Section 1: Hero Section -->
            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:6px; padding:24px; margin-bottom:28px;">
                <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:16px; color:#181715; display:flex; align-items:center; gap:8px;">
                    <span>✦</span> الواجهة الرئيسية (Hero Banner & Panther Section)
                </h3>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الشارة العلوية (Badge) - عربي</label>
                        <input type="text" name="hero_badge_ar" value="{{ old('hero_badge_ar', $themeSettings['hero_badge_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">الشارة العلوية (Badge) - إنجليزي</label>
                        <input type="text" name="hero_badge_en" value="{{ old('hero_badge_en', $themeSettings['hero_badge_en']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">العنوان الرئيسي بالواجهة - عربي</label>
                        <input type="text" name="hero_title_ar" value="{{ old('hero_title_ar', $themeSettings['hero_title_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; font-weight:600;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">العنوان الرئيسي بالواجهة - إنجليزي</label>
                        <input type="text" name="hero_title_en" value="{{ old('hero_title_en', $themeSettings['hero_title_en']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; font-weight:600;">
                    </div>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">النص الوصفي الشاعري (Subtitle) - عربي</label>
                    <textarea name="hero_subtitle_ar" rows="3" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">{{ old('hero_subtitle_ar', $themeSettings['hero_subtitle_ar']) }}</textarea>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">النص الوصفي الشاعري (Subtitle) - إنجليزي</label>
                    <textarea name="hero_subtitle_en" rows="3" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">{{ old('hero_subtitle_en', $themeSettings['hero_subtitle_en']) }}</textarea>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">مسار صورة الهيرو الرئيسية (صورة النمر والذهب)</label>
                    <input type="text" name="hero_image_url" value="{{ old('hero_image_url', $themeSettings['hero_image_url']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    <span style="font-size:11.5px; color:#888;">المسار الافتراضي: <code>/images/products/panther-hero.png</code></span>
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص الزر الرئيسي الذهبي (CTA 1)</label>
                        <input type="text" name="hero_cta_primary_ar" value="{{ old('hero_cta_primary_ar', $themeSettings['hero_cta_primary_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص الزر الثانوي الشفاف (CTA 2)</label>
                        <input type="text" name="hero_cta_secondary_ar" value="{{ old('hero_cta_secondary_ar', $themeSettings['hero_cta_secondary_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                </div>
            </div>

            <!-- Section 2: Announcement Bar -->
            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:6px; padding:24px; margin-bottom:28px;">
                <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:16px; color:#181715; display:flex; align-items:center; gap:8px;">
                    <span>📢</span> الشريط الإعلاني العلوي (Announcement Bar)
                </h3>

                <div style="margin-bottom:18px;">
                    <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                        <input type="checkbox" name="announcement_bar_active" value="1" {{ $themeSettings['announcement_bar_active'] == '1' ? 'checked' : '' }} style="accent-color:#c59b3f; width:16px; height:16px;">
                        <span style="font-size:13.5px; font-weight:600; color:#181715;">تفعيل وإظهار الشريط الإعلاني أعلى صفحات المتجر</span>
                    </label>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص الإعلان بالعربية</label>
                    <input type="text" name="announcement_bar_ar" value="{{ old('announcement_bar_ar', $themeSettings['announcement_bar_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>

                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص الإعلان بالإنجليزية</label>
                    <input type="text" name="announcement_bar_en" value="{{ old('announcement_bar_en', $themeSettings['announcement_bar_en']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                </div>
            </div>

            <!-- Section 3: Footer & Copyright -->
            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:6px; padding:24px; margin-bottom:28px;">
                <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:16px; color:#181715; display:flex; align-items:center; gap:8px;">
                    <span>⚖️</span> تذييل المتجر والحقوق (Footer & Copyright)
                </h3>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">حقوق النشر بالعربية</label>
                        <input type="text" name="footer_copyright_ar" value="{{ old('footer_copyright_ar', $themeSettings['footer_copyright_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">حقوق النشر بالإنجليزية</label>
                        <input type="text" name="footer_copyright_en" value="{{ old('footer_copyright_en', $themeSettings['footer_copyright_en']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end;">
                <button type="submit" class="btn btn-primary" style="padding:12px 32px; font-size:14px;">
                    حفظ وتحديث تصميم المتجر الحي ✦
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
