<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\CurrencyService;

class ProductManagerController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.form', ['product' => new Product()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:products,slug',
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'category' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'price_kwd' => 'nullable|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'material' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_url' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'in_stock' => 'nullable|boolean',
        ]);

        $images = [$request->input('image_url') ?: 'assets/images/bangle_gold_studio.jpg'];
        
        $priceKwd = !empty($validated['price_kwd']) 
            ? (float)$validated['price_kwd'] 
            : CurrencyService::convertUsdToKwd($validated['base_price']);

        Product::create([
            'slug' => $validated['slug'],
            'title_ar' => $validated['title_ar'],
            'title_en' => $validated['title_en'],
            'category' => $validated['category'],
            'base_price' => $validated['base_price'],
            'price_kwd' => $priceKwd,
            'compare_price' => $validated['compare_price'] ?? null,
            'material' => $validated['material'] ?? '14k_gold',
            'description_ar' => $validated['description_ar'] ?? null,
            'description_en' => $validated['description_en'] ?? null,
            'images' => $images,
            'is_featured' => $request->has('is_featured'),
            'in_stock' => $request->has('in_stock'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'تمت إضافة القطعة بنجاح إلى كتالوج المجوهرات.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.form', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'category' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'price_kwd' => 'nullable|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0',
            'material' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $images = $product->images ?: ['assets/images/bangle_gold_studio.jpg'];
        if (!empty($validated['image_url'])) {
            array_unshift($images, $validated['image_url']);
            $images = array_unique($images);
        }

        $priceKwd = !empty($validated['price_kwd']) 
            ? (float)$validated['price_kwd'] 
            : CurrencyService::convertUsdToKwd($validated['base_price']);

        $product->update([
            'slug' => $validated['slug'],
            'title_ar' => $validated['title_ar'],
            'title_en' => $validated['title_en'],
            'category' => $validated['category'],
            'base_price' => $validated['base_price'],
            'price_kwd' => $priceKwd,
            'compare_price' => $validated['compare_price'] ?? null,
            'material' => $validated['material'] ?? $product->material,
            'description_ar' => $validated['description_ar'] ?? null,
            'description_en' => $validated['description_en'] ?? null,
            'images' => $images,
            'is_featured' => $request->has('is_featured'),
            'in_stock' => $request->has('in_stock'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'تم تحديث تفاصيل وأسعار القطعة بنجاح.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'تم حذف القطعة من الكتالوج.');
    }
}
