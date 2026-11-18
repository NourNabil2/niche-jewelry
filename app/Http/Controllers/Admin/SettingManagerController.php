<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CurrencyService;

class SettingManagerController extends Controller
{
    public function index()
    {
        $currentCurrency = CurrencyService::current();
        return view('admin.settings.index', compact('currentCurrency'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'default_currency' => 'required|in:USD,KWD',
        ]);

        CurrencyService::set($validated['default_currency']);

        return redirect()->route('admin.settings.index')->with('success', 'تم حفظ إعدادات العملة والمتجر بنجاح.');
    }
}
