<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\Order;

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
                'price' => $item['stripe_price_id'],
                'quantity' => $item['quantity'],
            ];
        }

        // セッション作成（Stripe側）
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => url('/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        $sessionId = $request->get('session_id');

        $session = Session::retrieve($sessionId);

        $paymentIntent = $session->payment_intent;

        Order::create([
            'user_id' => 1,
            'total_price' => 0,
            'status' => 0,
            'payment_intent' => $paymentIntent,
        ]);

        Mail::to('test@example.com')->send(new OrderMail());

        session()->forget('cart');

        return view('checkout.success');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
