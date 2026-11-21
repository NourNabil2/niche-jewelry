@extends('layouts.admin')

@section('title', 'تحرير قصة الدار والحرفية • NICH JEWELRY')
@section('page_title', 'تحرير قصة الدار والحرفية (About & Heritage)')

@section('content')
<div style="max-width: 860px;">
    <div style="background:#ffffff; border:1px solid #e8e3d8; border-radius:6px; padding:32px; box-shadow:0 2px 8px rgba(0,0,0,0.02);">
        
        <p style="font-size:13.5px; color:#666; margin-top:0; margin-bottom:28px; line-height:1.6;">
            تحكم كامل في نصوص صفحة الدار (About & Heritage)، مراحل الصياغة الـ 18، دليل مقاسات المعصم، وبيانات التواصل مع كونسيرج الأتيليه في الكويت.
        </p>

        <form action="{{ route('admin.about.update') }}" method="POST">
            @csrf

            <!-- Section 1: Brand Story -->
            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:6px; padding:24px; margin-bottom:28px;">
                <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:16px; color:#181715;">
                    ✦ قصة الدار والرؤية (Brand Story)
                </h3>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">شعار / عنوان القصة - عربي</label>
                        <input type="text" name="about_tagline_ar" value="{{ old('about_tagline_ar', $about['about_tagline_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">شعار / عنوان القصة - إنجليزي</label>
                        <input type="text" name="about_tagline_en" value="{{ old('about_tagline_en', $about['about_tagline_en']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص قصة الدار - عربي</label>
                    <textarea name="about_story_ar" rows="4" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; line-height:1.6;">{{ old('about_story_ar', $about['about_story_ar']) }}</textarea>
                </div>

                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">نص قصة الدار - إنجليزي</label>
                    <textarea name="about_story_en" rows="4" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; line-height:1.6;">{{ old('about_story_en', $about['about_story_en']) }}</textarea>
                </div>
            </div>

            <!-- Section 2: Craftsmanship & Sizing Guide -->
            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:6px; padding:24px; margin-bottom:28px;">
                <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:16px; color:#181715;">
                    ✦ الحرفية ودليل المقاسات (Craftsmanship & Sizing)
                </h3>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">تفاصيل الصياغة اليدوية والذهب 18K (عربي)</label>
                    <textarea name="about_craft_ar" rows="3" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; line-height:1.6;">{{ old('about_craft_ar', $about['about_craft_ar']) }}</textarea>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">تفاصيل الصياغة اليدوية والذهب 18K (إنجليزي)</label>
                    <textarea name="about_craft_en" rows="3" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; line-height:1.6;">{{ old('about_craft_en', $about['about_craft_en']) }}</textarea>
                </div>

                <div style="margin-bottom:18px;">
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">إرشادات قياس المعصم (XS, S, M, L) - عربي</label>
                    <textarea name="about_sizing_guide_ar" rows="3" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; line-height:1.6;">{{ old('about_sizing_guide_ar', $about['about_sizing_guide_ar']) }}</textarea>
                </div>

                <div>
                    <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">إرشادات قياس المعصم (XS, S, M, L) - إنجليزي</label>
                    <textarea name="about_sizing_guide_en" rows="3" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px; line-height:1.6;">{{ old('about_sizing_guide_en', $about['about_sizing_guide_en']) }}</textarea>
                </div>
            </div>

            <!-- Section 3: Atelier Kuwait & Concierge Contact -->
            <div style="background:#faf8f5; border:1px solid #e8e3d8; border-radius:6px; padding:24px; margin-bottom:28px;">
                <h3 style="font-family:var(--font-serif); font-size:18px; margin-top:0; margin-bottom:16px; color:#181715;">
                    ✦ بيانات الأتيليه وخدمة العملاء الخاصة (Kuwait Concierge)
                </h3>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:18px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">عنوان المقر الرئيسي - عربي</label>
                        <input type="text" name="atelier_address_ar" value="{{ old('atelier_address_ar', $about['atelier_address_ar']) }}" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">عنوان المقر الرئيسي - إنجليزي</label>
                        <input type="text" name="atelier_address_en" value="{{ old('atelier_address_en', $about['atelier_address_en']) }}" dir="ltr" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:16px;">
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">رقم واتساب الكونسيرج</label>
                        <input type="text" name="atelier_whatsapp" value="{{ old('atelier_whatsapp', $about['atelier_whatsapp']) }}" dir="ltr" placeholder="+965 9999 1234" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">بريد المراسلات الخاص</label>
                        <input type="email" name="atelier_email" value="{{ old('atelier_email', $about['atelier_email']) }}" dir="ltr" placeholder="concierge@niche-jewelry.com" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-size:12.5px; font-weight:600; color:#444; margin-bottom:6px;">هاتف الأتيليه المباشر</label>
                        <input type="text" name="atelier_phone" value="{{ old('atelier_phone', $about['atelier_phone']) }}" dir="ltr" placeholder="+965 2200 4400" style="width:100%; box-sizing:border-box; padding:10px 14px; border:1px solid #d4cdbf; border-radius:4px; font-family:inherit; font-size:14px;">
                    </div>
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end;">
                <button type="submit" class="btn btn-primary" style="padding:12px 32px; font-size:14px;">
                    حفظ وتحديث معلومات الدار ✦
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
