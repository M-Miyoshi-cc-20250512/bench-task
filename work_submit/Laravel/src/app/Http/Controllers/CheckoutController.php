<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }
    public function checkout()
    {
        // Stripeのキー設定
        Stripe::setApiKey(config('services.stripe.secret'));

        // カート取得
        $cart = session()->get('cart', []);

        // 商品データ作る
        $line_items = [];
    }
}
