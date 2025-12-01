@extends('layouts.app')

@section('content')
<div class="product-detail">
    <!-- 画像 -->
    <div class="product-images">
        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="product-img">
    </div>

    <!-- 商品情報 -->
    <div class="product-info">
        <h1 >{{ $item['name'] }}</h1>
        <p>Price: ¥{{ $item['price'] }}</p>
        <p>Stock: {{ $item['stock'] }}</p>
        <p>Description: This is a dummy description for {{ $item['name'] }}.</p>

        <!-- オプション選択 -->
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

        <button>Add to Cart</button>
    </div>
</div>
@endsection