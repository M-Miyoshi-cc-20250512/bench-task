@extends('layouts.app')

@section('content')
<div class="product-detail">
    <!-- 画像 -->
    <div class="product-images">
        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="product-img">
    </div>

    <!-- 商品情報 -->
    <div class="product-info">
        <h1>{{ $item->name }}</h1>
        <p>Price: ¥{{ $item->price }}</p>
        <p>Stock: {{ $item->stock_quantity }}</p>
        <p>Description: This is a dummy description for {{ $item->name }}.</p>

        <div class="product-options">
            <label>Size:</label>
            <select>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>

            <label>Color:</label>
            <select>
                <option>Black</option>
                <option>Red</option>
                <option>Blue</option>
            </select>
        </div>

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf

            <input type="hidden" name="product_id" value="{{ $item->id }}">

            <button type="submit">Add to Cart</button>
        </form>
        <button onclick="history.back()">back</button>
    </div>
</div>
@endsection