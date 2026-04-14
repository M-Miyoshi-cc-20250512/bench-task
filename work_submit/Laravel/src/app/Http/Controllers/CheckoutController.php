<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

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

        foreach ($cart as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                    'unit_amount' => $item['price'],
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // セッション作成（Stripe側）
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
        ]);

        return redirect($session->url);
    }
    public function success()
    {
        // メール送信
        Mail::to('test@example.com')->send(new OrderMail());

        // カート削除
        session()->forget('cart');

        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
