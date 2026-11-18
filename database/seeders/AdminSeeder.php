<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\Promotion;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@niche-jewelry.com'],
            [
                'name' => 'Niche Atelier Master Admin',
                'password' => Hash::make('NicheAtelier2026!'),
                'role' => 'admin',
            ]
        );

        // 2. Settings
        $settings = [
            // General & Branding
            ['key' => 'site_name_ar', 'value' => 'دار نيش للمجوهرات الراقية', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_name_en', 'value' => 'Niche Fine Jewelry Atelier', 'group' => 'general', 'type' => 'text'],
            ['key' => 'default_currency', 'value' => 'USD', 'group' => 'general', 'type' => 'text'],
            ['key' => 'kwd_exchange_rate', 'value' => '0.308', 'group' => 'general', 'type' => 'number'],
            ['key' => 'free_shipping_min_usd', 'value' => '300', 'group' => 'general', 'type' => 'number'],

            // Hero & Homepage Design
            ['key' => 'hero_badge_ar', 'value' => 'استوديو الصياغة ثلاثي الأبعاد ✦ ذهب نقي 14K', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_badge_en', 'value' => '3D Atelier Studio ✦ Solid 14K Gold', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_title_ar', 'value' => 'صُممت لتنزلق بنعومة. صياغة تعبّر عنكِ.', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_title_en', 'value' => 'Crafted to glide softly. Jewelry that expresses you.', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_subtitle_ar', 'value' => 'عيشي تجربة تخصيص المجوهرات الراقية في بيئة ثلاثية الأبعاد تفاعلية فورية. نسقي دلايات عرق اللؤلؤ الطبيعي، الحروف المرصعة بالماس، والأشكال المصنوعة من الذهب الخالص عيار 14K عبر مساري إسورة جلايدر™ بوجهيها الأمامي والخلفي.', 'group' => 'theme', 'type' => 'textarea'],
            ['key' => 'hero_subtitle_en', 'value' => 'Experience fine jewelry personalization in an instant interactive 3D studio. Slide natural mother of pearl charms, diamond-set initials, and solid 14K gold motifs on the dual-track Glider™ bangle.', 'group' => 'theme', 'type' => 'textarea'],
            ['key' => 'hero_image_url', 'value' => '/images/products/panther-hero.png', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_cta_primary_ar', 'value' => 'صممي في استوديو الـ 3D', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_cta_primary_en', 'value' => 'Design in 3D Studio', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_cta_secondary_ar', 'value' => 'تصفحي المجموعات', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'hero_cta_secondary_en', 'value' => 'Explore Collections', 'group' => 'theme', 'type' => 'text'],

            // Announcement Bar
            ['key' => 'announcement_bar_active', 'value' => '1', 'group' => 'theme', 'type' => 'boolean'],
            ['key' => 'announcement_bar_ar', 'value' => 'شحن آمن ومؤمّن مجاناً لكافة دول الخليج العربي والشرق الأوسط للطلبات فوق 300$', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'announcement_bar_en', 'value' => 'Complimentary insured courier delivery across GCC on orders over $300', 'group' => 'theme', 'type' => 'text'],

            // About & Craftsmanship
            ['key' => 'about_tagline_ar', 'value' => 'صياغة كويتية خالدة بروح الفخامة المعاصرة', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_tagline_en', 'value' => 'Timeless Kuwaiti craftsmanship with contemporary haute joaillerie spirit', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_story_ar', 'value' => 'تأسست دار نيش في الكويت كدار صياغة راقية تجمع بين التراث اليدوي العريق وتقنيات الصياغة ثلاثية الأبعاد المعاصرة. كل قطعة مجوهرات لدينا هي تحفة فنية مصوغة يدوياً من الذهب الخالص عيار 14K والألماس الطبيعي وعرق اللؤلؤ الاستوائي، لتمنحك حرية التعبير وإعادة التنسيق في أي لحظة.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_story_en', 'value' => 'Founded in Kuwait, Niche Atelier blends centuries-old artisanal goldsmithing with contemporary interactive 3D design. Every piece is handcrafted from solid 14K gold, conflict-free natural diamonds, and luminous mother of pearl, offering complete freedom to reconfigure your story.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_craft_ar', 'value' => 'تمر كل إسورة جلايدر™ بـ 18 مرحلة صياغة دقيقة: من سكب الذهب عيار 14K النقي، والصقل اليدوي لمسارات الانزلاق بدقة الميكرون، وترصيع الأحجار يدوياً تحت المجهر، وحتى اختبارات الجودة والانزلاق السلس لكل دلاية.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_craft_en', 'value' => 'Every Glider™ bangle passes through 18 precision craft stages: pure 14K gold casting, micron-tolerance rail hand-polishing, microscope micro-pavé gemstone setting, and rigorous tactile gliding verification.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_sizing_guide_ar', 'value' => 'نوفر 4 مقاسات مدروسة لتناسب كل معصم: XS (5.5 بوصة / 14 سم)، S (6.0 بوصة / 15.2 سم)، M (6.5 بوصة / 16.5 سم)، L (7.0 بوصة / 17.8 سم). يوصى بلف شريط القياس حول المعصم وإضافة 0.5 بوصة لحرية انزلاق الدلايات.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_sizing_guide_en', 'value' => 'Available in 4 tailored wrist sizes: XS (5.5" / 14cm), S (6.0" / 15.2cm), M (6.5" / 16.5cm), L (7.0" / 17.8cm). Measure your wrist snugly and add 0.5 inches for optimal charm gliding drape.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'atelier_address_ar', 'value' => 'برج الحمراء الفاخر، شرق، مدينة الكويت', 'group' => 'about', 'type' => 'text'],
            ['key' => 'atelier_address_en', 'value' => 'Al Hamra Luxury Tower, Sharq, Kuwait City', 'group' => 'about', 'type' => 'text'],
            ['key' => 'atelier_whatsapp', 'value' => '+965 9999 1234', 'group' => 'about', 'type' => 'text'],
            ['key' => 'atelier_email', 'value' => 'concierge@niche-jewelry.com', 'group' => 'about', 'type' => 'text'],
            ['key' => 'atelier_phone', 'value' => '+965 2200 4400', 'group' => 'about', 'type' => 'text'],

            // Marketing & Tracking Pixels
            ['key' => 'meta_pixel_id', 'value' => '', 'group' => 'marketing', 'type' => 'text'],
            ['key' => 'tiktok_pixel_id', 'value' => '', 'group' => 'marketing', 'type' => 'text'],
            ['key' => 'snapchat_pixel_id', 'value' => '', 'group' => 'marketing', 'type' => 'text'],
            ['key' => 'ga4_measurement_id', 'value' => '', 'group' => 'marketing', 'type' => 'text'],
            ['key' => 'gtm_container_id', 'value' => '', 'group' => 'marketing', 'type' => 'text'],

            // Footer
            ['key' => 'footer_copyright_ar', 'value' => '© 2026 دار نيش للمجوهرات الفاخرة. جميع الحقوق محفوظة.', 'group' => 'theme', 'type' => 'text'],
            ['key' => 'footer_copyright_en', 'value' => '© 2026 Niche Fine Jewelry Atelier. All rights reserved.', 'group' => 'theme', 'type' => 'text'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(
                ['key' => $s['key']],
                ['value' => $s['value'], 'group' => $s['group'], 'type' => $s['type']]
            );
        }

        // 3. Banners
        Banner::updateOrCreate(
            ['placement' => 'hero'],
            [
                'title_ar' => 'صُممت لتنزلق بنعومة. صياغة تعبّر عنكِ.',
                'title_en' => 'Crafted to glide softly. Jewelry that expresses you.',
                'subtitle_ar' => 'عيشي تجربة تخصيص المجوهرات الراقية في بيئة ثلاثية الأبعاد تفاعلية فورية.',
                'subtitle_en' => 'Experience fine jewelry personalization in an instant interactive 3D studio.',
                'badge_text_ar' => 'استوديو الصياغة ثلاثي الأبعاد ✦ ذهب نقي 14K',
                'badge_text_en' => '3D Atelier Studio ✦ Solid 14K Gold',
                'image_url' => '/images/products/panther-hero.png',
                'link_url' => '/studio',
                'button_text_ar' => 'صممي في استوديو الـ 3D',
                'button_text_en' => 'Design in 3D Studio',
                'placement' => 'hero',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        Banner::updateOrCreate(
            ['placement' => 'top_bar'],
            [
                'title_ar' => 'شحن آمن ومؤمّن مجاناً لكافة دول الخليج العربي للطلبات فوق 300$',
                'title_en' => 'Complimentary insured courier delivery across GCC on orders over $300',
                'subtitle_ar' => 'استخدمي كود NICH15 للحصول على 15% خصم ترحيبي',
                'subtitle_en' => 'Use code NICH15 for 15% welcome privilege',
                'link_url' => '/shop',
                'placement' => 'top_bar',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        Banner::updateOrCreate(
            ['placement' => 'mid_banner'],
            [
                'title_ar' => 'خدمة النقش الليزري المجاني داخل الإسورة',
                'title_en' => 'Complimentary Laser Engraving Inside Your Bangle',
                'subtitle_ar' => 'خلّدي تاريخاً مميزاً أو اسماً محفوراً بدقة متناهية من الصاغة.',
                'subtitle_en' => 'Immortalize a cherished date or initials with haute joaillerie precision.',
                'image_url' => '/images/products/gold-bangle.png',
                'link_url' => '/studio',
                'button_text_ar' => 'تخصيص نقشك الآن',
                'button_text_en' => 'Customize Engraving',
                'placement' => 'mid_banner',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        // 4. Promotions / Coupons
        $promotions = [
            [
                'code' => 'NICH15',
                'title_ar' => 'خصم ترحيبي 15% على جميع القطع والدلايات',
                'title_en' => '15% Welcome Privilege on All Pieces & Charms',
                'discount_type' => 'percentage',
                'discount_value' => 15.00,
                'min_order_amount' => 0.00,
                'max_discount_amount' => 150.00,
                'usage_limit' => 500,
                'used_count' => 18,
                'is_active' => true,
            ],
            [
                'code' => 'ATELIER20',
                'title_ar' => 'امتياز صياغة الأتيليه 20% للطلبات فوق 350$',
                'title_en' => 'Atelier Privilege 20% on orders above $350',
                'discount_type' => 'percentage',
                'discount_value' => 20.00,
                'min_order_amount' => 350.00,
                'max_discount_amount' => 250.00,
                'usage_limit' => 200,
                'used_count' => 9,
                'is_active' => true,
            ],
            [
                'code' => 'WELCOME50',
                'title_ar' => 'قسيمة نقدية 50$ للعملاء الجدد (للطلبات فوق 400$)',
                'title_en' => '$50 Cash Gift on orders over $400',
                'discount_type' => 'fixed_usd',
                'discount_value' => 50.00,
                'min_order_amount' => 400.00,
                'max_discount_amount' => 50.00,
                'usage_limit' => 100,
                'used_count' => 12,
                'is_active' => true,
            ],
            [
                'code' => 'EID2026',
                'title_ar' => 'عرض مناسبات 2026 الحصري 25%',
                'title_en' => 'Special Occasion 25% Privilege',
                'discount_type' => 'percentage',
                'discount_value' => 25.00,
                'min_order_amount' => 500.00,
                'max_discount_amount' => 300.00,
                'usage_limit' => 50,
                'used_count' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($promotions as $promo) {
            Promotion::updateOrCreate(
                ['code' => $promo['code']],
                $promo
            );
        }
    }
}
