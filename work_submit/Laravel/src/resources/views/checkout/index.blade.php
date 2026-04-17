@extends('layouts.app')

@section('content')

<h1>購入画面</h1>

@foreach($cart as $item)

    <div style="margin-bottom:20px;">

        {{-- 画像 --}}
        <img src="{{ asset('storage/' . $item['image']) }}" style="width:100px;">

        {{-- 商品名 --}}
        <p>{{ $item['name'] }}</p>

        {{-- 小計 --}}
        <p>
            小計：¥{{ $item['price'] * $item['quantity'] }}
        </p>

        {{-- 個数 --}}
        <p>
            個数：{{ $item['quantity'] }}
        </p>

    </div>

@endforeach

<p>Subtotal：¥{{ $total }}</p>

<h2>Payment</h2>

<p>Credit card</p>
<form action="{{ route('checkout.checkout') }}" method="POST">
    @csrf
    <button type="submit">Pay now</button>
</form>
<button onclick="history.back()">back</button>

@endsection