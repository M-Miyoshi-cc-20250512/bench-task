<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ダミーの新着商品
        $newItems = [
            ['id' => 1, 'name' => 'New productA', 'price' => 2000, 'image' => '/dummy/a.jpg'],
            ['id' => 2, 'name' => 'New productB', 'price' => 3500, 'image' => '/dummy/b.jpg'],
            ['id' => 3, 'name' => 'New productc', 'price' => 1200, 'image' => '/dummy/c.jpg'],
        ];

        // ダミーのセール商品
        $saleItems = [
            ['id' => 4, 'name' => 'Sale productA', 'price' => 1500, 'image' => '/dummy/s1.jpg'],
            ['id' => 5, 'name' => 'Sale productB', 'price' => 980,  'image' => '/dummy/s2.jpg'],
        ];

        return view('home', compact('newItems', 'saleItems'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // ダミーデータ
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

        // 絞り込み
        $results = [];
        foreach ($allItems as $item) {
            if (stripos($item['name'], $keyword) !== false) {
                $results[] = $item;
            }
        }

        return view('home', [
            'newItems' => $results,
            'saleItems' => [],
            'rankingItems' => [],
        ]);
    }
    public function categoryTrending($category)
    {
        // ダミーデータ：カテゴリごとのトレンド商品
        $items = [
            'men' => [
                ['name' => 'MEN Trend 1', 'price' => 2000, 'image' => '/dummy/men1.jpg'],
            ],
            'women' => [
                ['name' => 'WOMEN Trend 1', 'price' => 2200, 'image' => '/dummy/women1.jpg'],
                ['name' => 'WOMEN Trend 2', 'price' => 3300, 'image' => '/dummy/women2.jpg'],
            ],
            'kids' => [
                ['name' => 'KIDS Trend 1', 'price' => 1800, 'image' => '/dummy/kids1.jpg'],
            ],
        ];

        // 存在するカテゴリかチェック
        if (!array_key_exists($category, $items)) {
            abort(404);
        }

        $trendingItems = $items[$category];

        return view('category.trending', compact('trendingItems', 'category'));
    }
}
