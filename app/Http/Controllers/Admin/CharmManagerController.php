<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charm;
use App\Services\CurrencyService;

class CharmManagerController extends Controller
{
    public function index()
    {
        $charms = Charm::orderBy('category')->orderBy('name_en')->paginate(20);
        return view('admin.charms.index', compact('charms'));
    }

    public function create()
    {
        return view('admin.charms.form', ['charm' => new Charm()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'charm_code' => 'required|string|unique:charms,charm_code',
            'name_ar' => 'required|string|max:191',
            'name_en' => 'required|string|max:191',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_kwd' => 'nullable|numeric|min:0',
            'mesh_type' => 'required|string',
            'thumbnail_url' => 'nullable|string',
        ]);

        $priceKwd = !empty($validated['price_kwd'])
            ? (float)$validated['price_kwd']
            : CurrencyService::convertUsdToKwd($validated['price']);

        Charm::create([
            'charm_code' => $validated['charm_code'],
            'name_ar' => $validated['name_ar'],
            'name_en' => $validated['name_en'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'price_kwd' => $priceKwd,
            'mesh_type' => $validated['mesh_type'],
            'thumbnail_url' => $validated['thumbnail_url'] ?? 'assets/charms/bee_gold.png',
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.charms.index')->with('success', 'تمت إضافة دلاية الـ 3D الجديدة بنجاح.');
    }

    public function edit($id)
    {
        $charm = Charm::findOrFail($id);
        return view('admin.charms.form', compact('charm'));
    }

    public function update(Request $request, $id)
    {
        $charm = Charm::findOrFail($id);

        $validated = $request->validate([
            'charm_code' => 'required|string|unique:charms,charm_code,' . $charm->id,
            'name_ar' => 'required|string|max:191',
            'name_en' => 'required|string|max:191',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'price_kwd' => 'nullable|numeric|min:0',
            'mesh_type' => 'required|string',
            'thumbnail_url' => 'nullable|string',
        ]);

        $priceKwd = !empty($validated['price_kwd'])
            ? (float)$validated['price_kwd']
            : CurrencyService::convertUsdToKwd($validated['price']);

        $charm->update([
            'charm_code' => $validated['charm_code'],
            'name_ar' => $validated['name_ar'],
            'name_en' => $validated['name_en'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'price_kwd' => $priceKwd,
            'mesh_type' => $validated['mesh_type'],
            'thumbnail_url' => $validated['thumbnail_url'] ?? $charm->thumbnail_url,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.charms.index')->with('success', 'تم تحديث تسعيرة وبيانات الدلاية بنجاح.');
    }

    public function destroy($id)
    {
        $charm = Charm::findOrFail($id);
        $charm->delete();
        return redirect()->route('admin.charms.index')->with('success', 'تم حذف الدلاية من الاستوديو.');
    }
}
