@extends('layouts.app')

@section('content')
<h1>{{ strtoupper($category) }} Trending Products</h1>
<div class="slider">
    <div class="slider-track">
        @foreach($trendingItems as $item)
        <div class="slide">
            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
            <p class=products-name>{{ $item['name'] }}</p>
            <p>￥{{ $item['price'] }}</p>
        </div>
        @endforeach
    </div>
    <div class="slider-button">
        <button class="prev">＜</button>
        <button class="next">＞</button>
    </div>
</div>
@endsection