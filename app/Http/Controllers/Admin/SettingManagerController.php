<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CurrencyService;
use App\Models\Setting;

class SettingManagerController extends Controller
{
    public function index()
    {
        $currentCurrency = CurrencyService::current();
        $enableLaserEngraving = Setting::get('enable_laser_engraving', true);
        return view('admin.settings.index', compact('currentCurrency', 'enableLaserEngraving'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'default_currency' => 'required|in:USD,KWD',
        ]);

        CurrencyService::set($validated['default_currency']);

        // Update 3D Laser Engraving feature status
        Setting::set(
            'enable_laser_engraving',
            $request->has('enable_laser_engraving'),
            'customizer',
            'boolean'
        );

        return redirect()->route('admin.settings.index')->with('success', 'تم حفظ إعدادات العملة وميزات الأتيليه بنجاح.');
    }
}

