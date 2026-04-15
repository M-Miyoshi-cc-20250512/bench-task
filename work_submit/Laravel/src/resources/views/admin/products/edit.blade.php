@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>商品編集</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        {{-- 編集フォーム --}}
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- 商品名 --}}
            <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            {{-- 説明 --}}
            <div class="form-group">
                <label for="description">説明</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $product->description }}" required>
            </div>

            {{-- カテゴリ --}}
            <div class="form-group">
                <label for="category">カテゴリ</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="men" {{ $product->category == 'men' ? 'selected' : '' }}>MEN</option>
                    <option value="women" {{ $product->category == 'women' ? 'selected' : '' }}>WOMEN</option>
                    <option value="kids" {{ $product->category == 'kids' ? 'selected' : '' }}>KIDS</option>
                </select>
            </div>

            {{-- 価格 --}}
            <div class="form-group">
                <label for="price">価格</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            {{-- 在庫 --}}
            <div class="form-group">
                <label for="stock_quantity">在庫数</label>
                <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" value="{{ $product->stock_quantity }}" required>
            </div>

            {{-- サイズ --}}
            <div class="form-group">
                <label for="size">サイズ</label>
                <select name="size" id="size" class="form-control">
                    <option value="">選択してください</option>
                    <option value="S" {{ $product->size == 'S' ? 'selected' : '' }}>S</option>
                    <option value="M" {{ $product->size == 'M' ? 'selected' : '' }}>M</option>
                    <option value="L" {{ $product->size == 'L' ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ $product->size == 'XL' ? 'selected' : '' }}>XL</option>
                    <option value="110" {{ $product->size == '110' ? 'selected' : '' }}>110</option>
                    <option value="120" {{ $product->size == '120' ? 'selected' : '' }}>120</option>
                    <option value="130" {{ $product->size == '130' ? 'selected' : '' }}>130</option>
                    <option value="140" {{ $product->size == '140' ? 'selected' : '' }}>140</option>
                    <option value="150" {{ $product->size == '150' ? 'selected' : '' }}>150</option>
                    <option value="160" {{ $product->size == '160' ? 'selected' : '' }}>160</option>
                </select>
            </div>

            {{-- カラー --}}
            <div class="form-group">
                <label for="color">カラー</label>
                <select name="color" id="color" class="form-control">
                    <option value="Black" {{ $product->color == 'Black' ? 'selected' : '' }}>Black</option>
                    <option value="White" {{ $product->color == 'White' ? 'selected' : '' }}>White</option>
                    <option value="Blue" {{ $product->color == 'Blue' ? 'selected' : '' }}>Blue</option>
                    <option value="Red" {{ $product->color == 'Red' ? 'selected' : '' }}>Red</option>
                    <option value="Yellow" {{ $product->color == 'Yellow' ? 'selected' : '' }}>Yellow</option>
                    <option value="Brown" {{ $product->color == 'Brown' ? 'selected' : '' }}>Brown</option>
                </select>
            </div>

            {{-- 画像 --}}
            <div class="form-group">
                <label for="image">画像</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" style="max-width:100px; margin-top:10px;">
                @endif
            </div>


            <div class="d-flex align-items-center mt-3">
                {{-- 送信 --}}
                <button type="submit" class="btn btn-primary" style="margin-right: 20px;">更新する</button>
                {{-- 戻る --}}
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection