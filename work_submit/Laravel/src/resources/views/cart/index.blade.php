@extends('layouts.app')

@section('content')

<h1>カート一覧</h1>

{{-- 成功メッセージ --}}
@if(session('success'))
<p>{{ session('success') }}</p>
@endif

{{-- カートに商品があるかチェック --}}
@if(count($cart) > 0)

@foreach($cart as $id => $item)

<div style="border:1px solid black; margin:10px; padding:10px;">

    <img src="{{ asset('storage/' . $item['image']) }}" style="width:100px;">

    <p>商品名：{{ $item['name'] }}</p>
    <p>価格：{{ $item['price'] }}円</p>
    <form action="{{ route('cart.update') }}" method="POST">
        @csrf

        <input type="hidden" name="product_id" value="{{ $id }}">

        <select name="quantity" onchange="this.form.submit()">
            @for ($i = 0; $i <= 10; $i++)
                <option value="{{ $i }}" {{ $item['quantity'] == $i ? 'selected' : '' }}>
                {{ $i }}
                </option>
                @endfor
        </select>
    </form>
    @if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
    @endif

    {{-- 削除ボタン --}}
    <form action="{{ route('cart.remove') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $id }}">
        <button type="submit">削除</button>
    </form>

</div>

@endforeach

<h2>合計：{{ $total }}円</h2>

<form action="{{ route('checkout.index') }}" method="GET">
    <button type="submit">購入手続きへ進む</button>
</form>

@else
<p>カートは空です</p>
@endif

@endsection