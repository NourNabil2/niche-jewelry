<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class ThemeManagerController extends Controller
{
    public function index()
    {
        $themeSettings = [
            'hero_badge_ar' => Setting::get('hero_badge_ar', 'استوديو الصياغة ثلاثي الأبعاد ✦ ذهب نقي 18K'),
            'hero_badge_en' => Setting::get('hero_badge_en', '3D Atelier Studio ✦ Solid 18K Gold'),
            'hero_title_ar' => Setting::get('hero_title_ar', 'صُممت لتنزلق بنعومة. صياغة تعبّر عنكِ.'),
            'hero_title_en' => Setting::get('hero_title_en', 'Crafted to glide softly. Jewelry that expresses you.'),
            'hero_subtitle_ar' => Setting::get('hero_subtitle_ar', 'عيشي تجربة تخصيص المجوهرات الراقية في بيئة ثلاثية الأبعاد تفاعلية فورية.'),
            'hero_subtitle_en' => Setting::get('hero_subtitle_en', 'Experience fine jewelry personalization in an instant interactive 3D studio.'),
            'hero_image_url' => Setting::get('hero_image_url', '/images/products/panther-hero.png'),
            'hero_cta_primary_ar' => Setting::get('hero_cta_primary_ar', 'صممي في استوديو الـ 3D'),
            'hero_cta_primary_en' => Setting::get('hero_cta_primary_en', 'Design in 3D Studio'),
            'hero_cta_secondary_ar' => Setting::get('hero_cta_secondary_ar', 'تصفحي المجموعات'),
            'hero_cta_secondary_en' => Setting::get('hero_cta_secondary_en', 'Explore Collections'),

            'announcement_bar_active' => Setting::get('announcement_bar_active', '1'),
            'announcement_bar_ar' => Setting::get('announcement_bar_ar', 'شحن آمن ومؤمّن مجاناً لكافة دول الخليج العربي والشرق الأوسط للطلبات فوق 300$'),
            'announcement_bar_en' => Setting::get('announcement_bar_en', 'Complimentary insured courier delivery across GCC on orders over $300'),

            'footer_copyright_ar' => Setting::get('footer_copyright_ar', '© 2026 دار نيش للمجوهرات الفاخرة. جميع الحقوق محفوظة.'),
            'footer_copyright_en' => Setting::get('footer_copyright_en', '© 2026 Niche Fine Jewelry Atelier. All rights reserved.'),
        ];

        return view('admin.theme.index', compact('themeSettings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'hero_badge_ar', 'hero_badge_en',
            'hero_title_ar', 'hero_title_en',
            'hero_subtitle_ar', 'hero_subtitle_en',
            'hero_image_url',
            'hero_cta_primary_ar', 'hero_cta_primary_en',
            'hero_cta_secondary_ar', 'hero_cta_secondary_en',
            'announcement_bar_ar', 'announcement_bar_en',
            'footer_copyright_ar', 'footer_copyright_en',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key), 'theme', 'text');
            }
        }

        // Checkbox for announcement_bar_active
        Setting::set('announcement_bar_active', $request->has('announcement_bar_active') ? '1' : '0', 'theme', 'boolean');

        return back()->with('success', 'تم حفظ وتحديث عناصر التصميم، البانر الرئيسي والشريط العلوي بنجاح.');
    }
}
