@extends('layouts.app')

@section('content')

<h1>{{ strtoupper($category) }} Products</h1>

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
        <a href="{{ route('products.show', ['category' => $item->category, 'id' => $item->id]) }}">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="product-img">
            <h3 class="product-title">{{ $item->name }}</h3>
        </a>
        <p>Price: ¥{{ $item->price }}</p>
        <p>Stock: {{ $item->stock_quantity }}</p>
    </div>
    @endforeach
</div>

@endsection