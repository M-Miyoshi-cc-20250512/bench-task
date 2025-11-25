@extends('layouts.app')

@section('content')

<h1>{{ $category }} Products</h1>

{{-- ソート --}}
<form method="GET">
    <select name="sort" onchange="this.form.submit()">
        <option value="">Sort by</option>
        <option value="asc">Price: Low to High</option>
        <option value="desc">Price: High to Low</option>
    </select>
</form>

<div class="product-list">
    @foreach($items as $item)
        <div class="product-card">
            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="product-img" >
            <h3>{{ $item['name'] }}</h3>
            <p>Price: ¥{{ $item['price'] }}</p>
            <p>Stock: {{ $item['stock'] }}</p>
            <button>Add to Cart</button>
        </div>
    @endforeach
</div>

@endsection