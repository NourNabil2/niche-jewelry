<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AboutManagerController extends Controller
{
    public function index()
    {
        $about = [
            'about_tagline_ar' => Setting::get('about_tagline_ar', ''),
            'about_tagline_en' => Setting::get('about_tagline_en', ''),
            'about_story_ar' => Setting::get('about_story_ar', ''),
            'about_story_en' => Setting::get('about_story_en', ''),
            'about_craft_ar' => Setting::get('about_craft_ar', ''),
            'about_craft_en' => Setting::get('about_craft_en', ''),
            'about_sizing_guide_ar' => Setting::get('about_sizing_guide_ar', ''),
            'about_sizing_guide_en' => Setting::get('about_sizing_guide_en', ''),
            'atelier_address_ar' => Setting::get('atelier_address_ar', ''),
            'atelier_address_en' => Setting::get('atelier_address_en', ''),
            'atelier_whatsapp' => Setting::get('atelier_whatsapp', ''),
            'atelier_email' => Setting::get('atelier_email', ''),
            'atelier_phone' => Setting::get('atelier_phone', ''),
        ];

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $fields = [
            'about_tagline_ar', 'about_tagline_en',
            'about_story_ar', 'about_story_en',
            'about_craft_ar', 'about_craft_en',
            'about_sizing_guide_ar', 'about_sizing_guide_en',
            'atelier_address_ar', 'atelier_address_en',
            'atelier_whatsapp', 'atelier_email', 'atelier_phone',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'about', 'textarea');
            }
        }

        return back()->with('success', 'تم حفظ وتحديث محتوى صفحة الدار والحرفية والتواصل بنجاح.');
    }
}
