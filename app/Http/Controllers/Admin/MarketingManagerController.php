<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class MarketingManagerController extends Controller
{
    public function index()
    {
        $marketing = [
            'meta_pixel_id' => Setting::get('meta_pixel_id', ''),
            'tiktok_pixel_id' => Setting::get('tiktok_pixel_id', ''),
            'snapchat_pixel_id' => Setting::get('snapchat_pixel_id', ''),
            'ga4_measurement_id' => Setting::get('ga4_measurement_id', ''),
            'gtm_container_id' => Setting::get('gtm_container_id', ''),
        ];

        return view('admin.marketing.index', compact('marketing'));
    }

    public function update(Request $request)
    {
        $keys = [
            'meta_pixel_id',
            'tiktok_pixel_id',
            'snapchat_pixel_id',
            'ga4_measurement_id',
            'gtm_container_id',
        ];

        foreach ($keys as $key) {
            Setting::set($key, trim($request->input($key, '')), 'marketing', 'text');
        }

        return back()->with('success', 'تم حفظ معرّفات البيكسل وأنظمة التتبع الإعلاني بنجاح.');
    }
}
