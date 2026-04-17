<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Mail\RefundMail;
use Stripe\Exception\SignatureVerificationException;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                $secret
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        // イベント分岐
        
        if ($event['type'] === 'charge.refunded') {

            $paymentIntent = $event['data']['object']['payment_intent'];

            $order = Order::where('payment_intent', $paymentIntent)->first();

            if ($order) {
                $order->update(['status' => 2]);

                // メール送信
                Mail::to('test@example.com')->send(new RefundMail());
            }
        }
        return response()->json(['status' => 'success']);
    }
}
