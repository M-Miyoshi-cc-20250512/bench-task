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

        // ダミーのランキング商品
        $rankingItems = [
            ['id' => 6, 'name' => 'No1 product', 'price' => 2200, 'image' => '/dummy/r1.jpg'],
            ['id' => 7, 'name' => 'No2 product', 'price' => 5400, 'image' => '/dummy/r2.jpg'],
            ['id' => 8, 'name' => 'No3 product', 'price' => 3100, 'image' => '/dummy/r3.jpg'],
        ];

        return view('home', compact('newItems', 'saleItems', 'rankingItems'));
    }
}
