<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($category, Request $request)
    {
        $query = Product::query()
            ->where('category', strtoupper($category));

        // キーワード検索
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where('name', 'like', "%{$keyword}%");
        }

        // ソート
        if ($request->filled('sort')) {
            $sort = $request->sort;
            $query->orderBy('price', $sort);
        }

        $items = $query->get();

        return view('products.index', [
            'items' => $items,
            'category' => $category
        ]);
    }
    public function showProduct($category, $id)
    {
        $item = Product::where('category', strtoupper($category))
            ->where('id', $id)
            ->firstOrFail();

        return view('products.show', ['item' => $item]);
    }
}
