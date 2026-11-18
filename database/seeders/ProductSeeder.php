<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'slug' => 'glider-14k-gold',
                'title_ar' => 'إسورة جلايدر™ المخصصة من الذهب الخالص 14K',
                'title_en' => 'Personalized Glider Charm Bangle™',
                'description_ar' => 'إسورتنا المبتكرة الحاصلة على براءة اختراع والمصممة بمسارين متوازيين على الوجهين. انزلقي بدلايات الذهب الخالص عيار 14 قيراط، عرق اللؤلؤ الطبيعي، والألماس الحر—حرية تامة في السحب والتدوير وإعادة الترتيب في استوديو الـ 3D.',
                'description_en' => 'Our patented signature hinged bangle engineered with precision dual-sided recessed glider tracks. Slide solid 14K gold initials, Mother of Pearl icons, and natural pavé diamond charms onto both the front and back channels—drag, rotate, and rearrange freely anytime.',
                'category' => 'bangles',
                'base_price' => 410.00,
                'compare_price' => 465.00,
                'material' => '14k_gold',
                'images' => [
                    'assets/images/bangle_gold_studio.jpg',
                    'assets/images/hero_editorial.jpg',
                    'assets/images/craftsmanship_editorial.jpg',
                    'assets/images/bangle_silver_studio.jpg',
                ],
                'specs' => [
                    'Solid 14K Recycled Gold or 925 Sterling Silver',
                    'Dual-track precision glider channel (Front & Back)',
                    'Concealed push-button box clasp with safety click',
                    'Band Height: 5.0mm • Channel Depth: 0.85mm',
                    'Holds up to 8 charms per side (16 total)',
                ],
                'is_featured' => true,
                'in_stock' => true,
            ],
            [
                'slug' => 'glider-925-silver',
                'title_ar' => 'إسورة جلايدر™ الفضة الإسترليني 925 المطلية بالروديوم',
                'title_en' => '925 Sterling Silver Glider Bangle',
                'description_ar' => 'فضة إسترليني إيطالية مصقولة يدوياً عيار 925 مع طبقة حماية من الروديوم الفاخر لمنع التأكسد، ومجهزة بمسار جلايدر المزدوج.',
                'description_en' => 'Hand-polished Italian 925 sterling silver with rhodium anti-tarnish finish and our signature dual-sided charm glider groove. Designed for cool minimalist stacking and effortless customization in our 3D Atelier.',
                'category' => 'bangles',
                'base_price' => 225.00,
                'compare_price' => null,
                'material' => 'sterling_silver',
                'images' => [
                    'assets/images/bangle_silver_studio.jpg',
                    'assets/images/hero_editorial.jpg',
                    'assets/images/bangle_gold_studio.jpg',
                ],
                'specs' => [
                    'Hallmarked 925 Sterling Silver with Platinum-family Rhodium plating',
                    'Compatible with all Glider Charms (letters, numbers & icons)',
                    'Water-resistant & hypoallergenic finish',
                ],
                'is_featured' => true,
                'in_stock' => true,
            ],
            [
                'slug' => 'glider-rose-gold',
                'title_ar' => 'إسورة جلايدر™ الذهب الوردي 14K الناعمة',
                'title_en' => '14K Rose Gold Blush Glider Bangle',
                'description_ar' => 'مصنوعة من الذهب الوردي الدافئ عيار 14 قيراط، تحتضن المعصم برقة بالغة مع مسار التخصيص المنزلق بوجهين.',
                'description_en' => 'Cast in warm blush-toned 14K Rose Gold, this slim hinged oval cuff hugs the wrist comfortably while housing our dual-sided charm glider rail.',
                'category' => 'bangles',
                'base_price' => 430.00,
                'compare_price' => null,
                'material' => 'rose_gold',
                'images' => [
                    'assets/images/bangle_rose_studio.jpg',
                    'assets/images/craftsmanship_editorial.jpg',
                ],
                'specs' => [
                    'Solid 14K Rose Gold (58.5% Pure Gold alloyed with copper)',
                    'High-gloss mirror interior with embossed hallmark',
                    'Dual front & back glider capability',
                ],
                'is_featured' => false,
                'in_stock' => true,
            ],
            [
                'slug' => 'glider-collector-stack',
                'title_ar' => 'ثنائية كوليكتور ستّاك المميزة (إسورتان معاً)',
                'title_en' => 'Atelier Collector Stack Duo (2 Bangles)',
                'description_ar' => 'اجمعي بين إسورة جلايدر المخصصة 14K وإسورة الميرور اليومية بسعر مفضل من الأتيليه.',
                'description_en' => 'Pair our iconic 14K Personalized Glider Bangle with a matching everyday stacking band at preferred atelier pricing. Customize your primary bangle directly in our 3D studio.',
                'category' => 'bangles',
                'base_price' => 760.00,
                'compare_price' => 820.00,
                'material' => '14k_gold',
                'images' => [
                    'assets/images/hero_editorial.jpg',
                    'assets/images/bangle_gold_studio.jpg',
                ],
                'specs' => [
                    'Includes 1x Personalized Glider Bangle + 1x Hammered Mirror Band',
                    'Packaged in dual velvet collector presentation box',
                ],
                'is_featured' => true,
                'in_stock' => true,
            ],
            [
                'slug' => 'charm-bee-mop',
                'title_ar' => 'دلاية النحلة من عرق اللؤلؤ الطبيعي والذهب 14K',
                'title_en' => 'Mother of Pearl Bee Glider Charm',
                'description_ar' => 'منحوتة من الذهب الأصفر الخالص 14K مع أجنحة من عرق اللؤلؤ الطبيعي المتلألئ وخطوط المينا السوداء.',
                'description_en' => 'Sculpted in solid 14K yellow gold and inlaid with luminous hand-carved white Mother of Pearl wings and glossy black enamel stripes. Engineered to glide smoothly onto any Nich Jewelry bangle track.',
                'category' => 'charms',
                'base_price' => 65.00,
                'compare_price' => null,
                'material' => '14k_gold',
                'images' => [
                    'assets/charms/bee_gold.png',
                    'assets/charms/bee_white.png',
                ],
                'specs' => [
                    '14K Solid Yellow Gold frame & slider notch',
                    'Genuine Iridescent Mother of Pearl wing inlays',
                    'Dimensions: 4.6mm x 4.4mm',
                ],
                'is_featured' => true,
                'in_stock' => true,
            ],
            [
                'slug' => 'charm-martini-olive',
                'title_ar' => 'دلاية كأس المارتيني مع الزيتونة الإيطالية',
                'title_en' => 'Martini with Enamel Olive Charm',
                'description_ar' => 'تصميم مرح وأنيق يجمع بين المينا البيضاء والزيتونة الخضراء المنقوشة في إطار ذهب أصفر عيار 14.',
                'description_en' => 'Equal parts playful and refined. Our signature cocktail glider features crisp white enamel and a hand-painted pimento green olive skewer set in 14K solid gold.',
                'category' => 'charms',
                'base_price' => 60.00,
                'compare_price' => null,
                'material' => '14k_gold',
                'images' => [
                    'assets/charms/martini_gold.png',
                    'assets/charms/martini_white.png',
                ],
                'specs' => [
                    '14K Solid Yellow Gold & Italian vitreous enamel',
                    'Fits seamlessly into Front & Back glider tracks',
                ],
                'is_featured' => false,
                'in_stock' => true,
            ],
            [
                'slug' => 'charm-pave-heart',
                'title_ar' => 'دلاية القلب المفرغ المرصعة بقطع الألماس بافيه',
                'title_en' => 'Pavé Diamond Open Heart Charm',
                'description_ar' => '12 فصاً من الألماس الطبيعي النقي مرصوفة بعناية في إطار قلب مفرغ من الذهب الخالص.',
                'description_en' => 'Twelve conflict-free G-H VS natural micro-pavé diamonds set into an airy open heart silhouette. Catches light from every wrist movement.',
                'category' => 'charms',
                'base_price' => 95.00,
                'compare_price' => null,
                'material' => '14k_gold',
                'images' => [
                    'assets/charms/heart_gold.png',
                ],
                'specs' => [
                    '0.08 ctw Conflict-Free G-H VS Natural Diamonds',
                    'Solid 14K Yellow Gold',
                    '4.3mm x 4.2mm glider profile',
                ],
                'is_featured' => true,
                'in_stock' => true,
            ],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
