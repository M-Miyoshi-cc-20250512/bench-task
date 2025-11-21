@extends('layouts.app')

@section('content')

    <h1>Home page</h1>

{{-- スライダー：新着商品 --}}
<h2>New Products</h2>
<div class="slider">
  <div class="slider-track">
    @foreach($newItems as $item)
      <div class="slide">
        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
        <p calss=products>{{ $item['name'] }}</p>
        <p>￥{{ $item['price'] }}</p>
      </div>
    @endforeach
  </div>
  <button class="prev">＜</button>
  <button class="next">＞</button>
</div>

<hr>

{{-- スライダー：セール商品 --}}
<h2>SALE</h2>
<div>
    @foreach($saleItems as $item)
        <div>
            <img src="{{ $item['image'] }}" width="100">
            <p>{{ $item['name'] }}</p>
            <p>￥{{ $item['price'] }}</p>
        </div>
    @endforeach
</div>

<hr>

{{-- ランキング --}}
<h2>Trending products</h2>
<ol>
    @foreach($rankingItems as $item)
        <li>
            <img src="{{ $item['image'] }}" width="100">
            <p>￥{{ $item['name'] }}（{{ $item['price'] }}）</p>
        </li>
    @endforeach
</ol>

@endsection