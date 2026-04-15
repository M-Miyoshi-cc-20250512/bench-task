<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        //  送られてきた商品IDを受け取る
        $productId = $request->product_id;

        //  DBから商品を取ってくる
        $product = Product::findOrFail($productId);

        //  セッションからカートを取得
        $cart = session()->get('cart', []);

        //  すでにカートにあるかチェック
        if (isset($cart[$productId])) {
            // あったら数量+1
            $cart[$productId]['quantity']++;
        } else {
            // なかったら新しく追加
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'カートに追加しました');
    }
    public function index()
    {
        // セッションからカート取得
        $cart = session()->get('cart', []);

        // 合計金額計算
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }
    public function remove(Request $request)
{
    $productId = $request->product_id;

    // セッションからカート取得
    $cart = session()->get('cart', []);

    // カートにあれば削除
    if (isset($cart[$productId])) {
        unset($cart[$productId]);
    }

    // セッション更新
    session()->put('cart', $cart);

    return back()->with('success', '商品を削除しました');
}
public function update(Request $request)
{
    $productId = $request->product_id;
    $quantity = $request->quantity;

    // セッションからカート取得
    $cart = session()->get('cart', []);

    // バリデーション
    if ($quantity <= 0) {
        return back()->with('error', '数量は1以上にしてください');
    }

    // 数量更新
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] = $quantity;
    }

    session()->put('cart', $cart);

    return back()->with('success', '数量を更新しました');
}
}
