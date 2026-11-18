<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $query = Product::query();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $products = $query->paginate(12);
        return view('collections', compact('products', 'category'));
    }
}
