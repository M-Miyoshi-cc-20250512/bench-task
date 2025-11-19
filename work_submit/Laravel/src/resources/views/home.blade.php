<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
</head>
<body>
    <h1>Home page</h1>

{{-- 検索バー --}}
<form action="#" method="GET">
    <input type="text" name="keyword" placeholder="Search for products">
    <button type="submit">Search</button>
</form>

<hr>

{{-- スライダー：新着商品 --}}
<h2>New Products</h2>
<div>
    @foreach($newItems as $item)
        <div>
            <img src="{{ $item['image'] }}" width="100">
            <p>{{ $item['name'] }}</p>
            <p>￥{{ $item['price'] }}</p>
        </div>
    @endforeach
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

{{-- カテゴリ --}}
<h2>Category</h2>
<button>MEN</button>
<button>WOMEN</button>
<button>KIDS</button>

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
</body>
</html>