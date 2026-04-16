<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // ダミーの新着商品
        $newItems = [
            ['id' => 1, 'name' => 'MEN Top A', 'price' => 2000, 'category' => 'men', 'size' => 'M', 'color' => 'Black', 'stock' => 10, 'image' => '/dummy/men1.jpg'],
            ['id' => 2, 'name' => 'WOMEN Dress red', 'price' => 3000, 'category' => 'women', 'size' => 'L', 'color' => 'Red', 'stock' => 5, 'image' => '/dummy/women2.jpg'],
            ['id' => 3, 'name' => 'WOMEN Dress black1', 'price' => 4000, 'category' => 'women', 'size' => 'S', 'color' => 'Black', 'stock' => 2, 'image' => '/dummy/women3.jpg'],

        ];

        // ダミーのセール商品
        $saleItems = [
            ['id' => 4, 'name' => 'Sale productA', 'price' => 1500, 'image' => '/dummy/s1.jpg'],
            ['id' => 5, 'name' => 'Sale productB', 'price' => 980,  'image' => '/dummy/s2.jpg'],
        ];
        $rankingItems = [
            ['id' => 1, 'name' => 'Ranking A', 'price' => 2500, 'image' => '/dummy/r1.jpg'],
            ['id' => 2, 'name' => 'Ranking B', 'price' => 3000, 'image' => '/dummy/r2.jpg'],
        ];

        return view('home', compact('newItems', 'saleItems', 'rankingItems'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // ダミーデータ
        $allItems = [
            ['id' => 1, 'name' => 'MEN Top A', 'price' => 2000, 'category' => 'men', 'size' => 'M', 'color' => 'Black', 'stock' => 10, 'image' => '/dummy/men1.jpg'],
            ['id' => 2, 'name' => 'WOMEN Dress red', 'price' => 3000, 'category' => 'women', 'size' => 'L', 'color' => 'Red', 'stock' => 5, 'image' => '/dummy/women2.jpg'],
            ['id' => 3, 'name' => 'WOMEN Dress black1', 'price' => 4000, 'category' => 'women', 'size' => 'S', 'color' => 'Black', 'stock' => 2, 'image' => '/dummy/women3.jpg'],
            ['id' => 4, 'name' => 'WOMEN Dress black2', 'price' => 5000, 'category' => 'women', 'size' => 'M', 'color' => 'Black', 'stock' => 4, 'image' => '/dummy/women1.jpg'],
            ['id' => 5, 'name' => 'KIDS Dress blue', 'price' => 5000, 'category' => 'kids', 'size' => '120', 'color' => 'Blue', 'stock' => 4, 'image' => '/dummy/kids5.jpg'],
            ['id' => 6, 'name' => 'KIDS Dress green', 'price' => 6000, 'category' => 'kids', 'size' => '110', 'color' => 'White', 'stock' => 3, 'image' => '/dummy/kids4.jpg'],
            ['id' => 7, 'name' => 'KIDS Dress black', 'price' => 2000, 'category' => 'kids', 'size' => '130', 'color' => 'Black', 'stock' => 6, 'image' => '/dummy/kids3.jpg'],
            ['id' => 8, 'name' => 'KIDS Dress brown', 'price' => 2000, 'category' => 'kids', 'size' => '160', 'color' => 'Brown', 'stock' => 3, 'image' => '/dummy/kids1.jpg'],
        ];

        // キーワードで絞り込み
        $results = array_filter($allItems, fn($item) => stripos($item['name'], $keyword) !== false);

        // ヒットした商品が1件以上あれば商品詳細ページへリダイレクト
        if (!empty($results)) {
            $firstItem = array_values($results)[0]; // 配列の最初の要素を取得
            return redirect()->route('products.show', [
                'category' => $firstItem['category'],
                'id' => $firstItem['id'],
            ]);
        }

        // ヒットなしの場合はホームに戻す
        return redirect()->route('home')->with('message', '該当する商品がありません');
    }
    public function categoryTrending($category)
    {
        $trendingItems = Product::where('category', $category)
            ->where('is_trend', 1)
            ->get();

        return view('category.trending', compact('trendingItems', 'category'));
    }
}
