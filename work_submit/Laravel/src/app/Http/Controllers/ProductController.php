<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category, Request $request)
    {
        // ダミー商品データ
        $allItems = [
            ['name' => 'MEN Top A', 'price' => 2000, 'category' => 'men', 'size' => 'M', 'color' => 'Black', 'stock' => 10, 'image' => '/dummy/men1.jpg'],
            ['name' => 'WOMEN Dress red', 'price' => 3000, 'category' => 'women', 'size' => 'L', 'color' => 'Red', 'stock' => 5, 'image' => '/dummy/women2.jpg'],
            ['name' => 'WOMEN Dress black1', 'price' => 4000, 'category' => 'women', 'size' => 'S', 'color' => 'Black', 'stock' => 2, 'image' => '/dummy/women3.jpg'],
            ['name' => 'WOMEN Dress black2', 'price' => 5000, 'category' => 'women', 'size' => 'M', 'color' => 'Black', 'stock' => 4, 'image' => '/dummy/women1.jpg'],
            ['name' => 'KIDS Dress blue', 'price' => 5000, 'category' => 'kids', 'size' => '120', 'color' => 'Blue', 'stock' => 4, 'image' => '/dummy/kids5.jpg'],
            ['name' => 'KIDS Dress white', 'price' => 6000, 'category' => 'kids', 'size' => '110', 'color' => 'White', 'stock' => 3, 'image' => '/dummy/kids4.jpg'],
            ['name' => 'KIDS Dress black', 'price' => 2000, 'category' => 'kids', 'size' => '130', 'color' => 'Black', 'stock' => 6, 'image' => '/dummy/kids3.jpg'],
            ['name' => 'KIDS Dress brown', 'price' => 2000, 'category' => 'kids', 'size' => '160', 'color' => 'Brown', 'stock' => 3, 'image' => '/dummy/kids1.jpg'],
        ];

        // カテゴリで絞り込み
        $items = array_filter($allItems, fn($item) => $item['category'] === $category);

        // 検索（キーワード）
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $items = array_filter($items, fn($item) => stripos($item['name'], $keyword) !== false);
        }

        // ソート（price asc/desc）
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            usort($items, fn($a, $b) => $sort === 'asc' ? $a['price'] <=> $b['price'] : $b['price'] <=> $a['price']);
        }

        return view('products.index', ['items' => $items, 'category' => $category]);
    }
}
