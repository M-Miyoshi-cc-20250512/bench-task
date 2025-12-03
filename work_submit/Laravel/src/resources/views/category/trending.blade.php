@extends('layouts.app')

@section('content')
<h1>{{ strtoupper($category) }} Trending Products</h1>
<div class="slider">
    <div class="slider-track">
        @foreach($trendingItems as $item)
        <div class="slide">
            <a href="{{ route('products.show', ['category' => $item['category'], 'id' => $item['id']]) }}">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                <h3 class="products-name">{{ $item->name }}</h3>
                <p>￥{{ $item->price }}</p>
            </a>
        </div>
        @endforeach
    </div>
    <div class="slider-button">
        <button class="prev">＜</button>
        <button class="next">＞</button>
    </div>
</div>
@endsection