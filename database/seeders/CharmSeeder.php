<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Charm;

class CharmSeeder extends Seeder
{
    public function run(): void
    {
        $symbols = [
            ['charm_code' => 'bee', 'name_ar' => 'نحلة عرق اللؤلؤ', 'name_en' => 'Mother of Pearl Bee', 'category' => 'symbols', 'price' => 45.00, 'mesh_type' => 'parametric', 'thumbnail_url' => 'assets/charms/bee_gold.png'],
            ['charm_code' => 'martini', 'name_ar' => 'كأس المارتيني', 'name_en' => 'Martini with Olive', 'category' => 'symbols', 'price' => 45.00, 'mesh_type' => 'parametric', 'thumbnail_url' => 'assets/charms/martini_gold.png'],
            ['charm_code' => 'cherries', 'name_ar' => 'الكرز الأحمر بالمينا', 'name_en' => 'Red Enamel Cherries', 'category' => 'symbols', 'price' => 45.00, 'mesh_type' => 'parametric', 'thumbnail_url' => 'assets/charms/cherries.png'],
            ['charm_code' => 'heart', 'name_ar' => 'قلب الذهب الصافي', 'name_en' => 'Solid Gold Heart', 'category' => 'symbols', 'price' => 45.00, 'mesh_type' => 'parametric', 'thumbnail_url' => 'assets/charms/heart_gold.png'],
            ['charm_code' => 'eye', 'name_ar' => 'عين الحماية الزرقاء', 'name_en' => 'Evil Eye Charm', 'category' => 'symbols', 'price' => 45.00, 'mesh_type' => 'parametric', 'thumbnail_url' => 'assets/charms/eye_gold.png'],
            ['charm_code' => 'star', 'name_ar' => 'نجمة الذهب اللامعة', 'name_en' => 'Gold Star Charm', 'category' => 'symbols', 'price' => 45.00, 'mesh_type' => 'parametric', 'thumbnail_url' => 'assets/charms/star_gold.png'],
        ];

        foreach ($symbols as $s) {
            Charm::updateOrCreate(['charm_code' => $s['charm_code']], $s);
        }

        // Letters a-z
        foreach (range('a', 'z') as $char) {
            Charm::updateOrCreate(
                ['charm_code' => 'letter_' . $char],
                [
                    'name_ar' => 'حرف ' . strtoupper($char) . ' بافيه ألماسي',
                    'name_en' => 'Letter ' . strtoupper($char) . ' Pavé Charm',
                    'category' => 'letters',
                    'price' => 38.00,
                    'mesh_type' => 'cutout_mesh',
                    'thumbnail_url' => 'assets/charms/' . $char . '_gold.png',
                ]
            );
        }

        // Numbers 0-9
        foreach (range(0, 9) as $num) {
            Charm::updateOrCreate(
                ['charm_code' => 'number_' . $num],
                [
                    'name_ar' => 'رقم الحظ ' . $num . ' ذهب خالص',
                    'name_en' => 'Lucky Number ' . $num . ' Gold Charm',
                    'category' => 'numbers',
                    'price' => 35.00,
                    'mesh_type' => 'cutout_mesh',
                    'thumbnail_url' => 'assets/charms/' . $num . '_gold.png',
                ]
            );
        }
    }
}
