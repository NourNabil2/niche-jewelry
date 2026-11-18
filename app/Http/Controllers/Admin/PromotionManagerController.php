<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionManagerController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderBy('id', 'desc')->paginate(15);
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.form', [
            'promotion' => new Promotion([
                'discount_type' => 'percentage',
                'discount_value' => 15,
                'is_active' => true,
                'min_order_amount' => 0,
            ]),
            'isEdit' => false
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:50|unique:promotions,code',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'discount_type' => 'required|in:percentage,fixed_usd,fixed_kwd',
            'discount_value' => 'required|numeric|min:0.01',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:starts_at',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['code'] = strtoupper(trim($data['code']));
        $data['is_active'] = $request->has('is_active');
        $data['min_order_amount'] = $data['min_order_amount'] ?? 0;

        Promotion::create($data);

        return redirect()->route('admin.promotions.index')->with('success', 'تم إنشاء كود الخصم الجديد بنجاح.');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.form', [
            'promotion' => $promotion,
            'isEdit' => true
        ]);
    }

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $data = $request->validate([
            'code' => 'required|string|max:50|unique:promotions,code,' . $promotion->id,
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'discount_type' => 'required|in:percentage,fixed_usd,fixed_kwd',
            'discount_value' => 'required|numeric|min:0.01',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['code'] = strtoupper(trim($data['code']));
        $data['is_active'] = $request->has('is_active');
        $data['min_order_amount'] = $data['min_order_amount'] ?? 0;

        $promotion->update($data);

        return redirect()->route('admin.promotions.index')->with('success', 'تم تحديث كود الخصم بنجاح.');
    }

    public function toggle($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->is_active = !$promotion->is_active;
        $promotion->save();

        return back()->with('success', 'تم تغيير حالة التفعيل بنجاح.');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('admin.promotions.index')->with('success', 'تم حذف كود الخصم بنجاح.');
    }
}
