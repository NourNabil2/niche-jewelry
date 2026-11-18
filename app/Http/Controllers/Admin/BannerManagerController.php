<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerManagerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.form', [
            'banner' => new Banner([
                'placement' => 'hero',
                'is_active' => true,
                'sort_order' => 1,
            ]),
            'isEdit' => false
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'placement' => 'required|in:hero,top_bar,mid_banner,popup_offer',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_ar' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'badge_text_ar' => 'nullable|string|max:100',
            'badge_text_en' => 'nullable|string|max:100',
            'image_url' => 'nullable|string|max:500',
            'link_url' => 'nullable|string|max:500',
            'button_text_ar' => 'nullable|string|max:100',
            'button_text_en' => 'nullable|string|max:100',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'تم إنشاء البانر الإعلاني بنجاح.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.form', [
            'banner' => $banner,
            'isEdit' => true
        ]);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $data = $request->validate([
            'placement' => 'required|in:hero,top_bar,mid_banner,popup_offer',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_ar' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'badge_text_ar' => 'nullable|string|max:100',
            'badge_text_en' => 'nullable|string|max:100',
            'image_url' => 'nullable|string|max:500',
            'link_url' => 'nullable|string|max:500',
            'button_text_ar' => 'nullable|string|max:100',
            'button_text_en' => 'nullable|string|max:100',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'تم تحديث بيانات البانر بنجاح.');
    }

    public function toggle($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->is_active = !$banner->is_active;
        $banner->save();

        return back()->with('success', 'تم تغيير حالة عرض البانر بنجاح.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'تم حذف البانر بنجاح.');
    }
}
