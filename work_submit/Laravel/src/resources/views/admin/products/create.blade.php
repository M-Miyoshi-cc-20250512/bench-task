@extends('adminlte::page') {{-- AdminLTE のレイアウト --}}

@section('title', '商品追加')

@section('content_header')

<h1>商品追加</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        {{-- 商品登録フォーム --}}
        <form action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            {{-- 商品名 --}}
            <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            {{-- 説明 --}}
            <div class="form-group">
                <label for="description">説明</label>
                <input type="text" name="description" id="description" class="form-control" required>
            </div>

            {{-- カテゴリ --}}
            <div class="form-group">
                <label for="category">カテゴリ</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">選択してください</option>
                    <option value="men">MEN</option>
                    <option value="women">WOMEN</option>
                    <option value="kids">KIDS</option>
                </select>
            </div>

            {{-- 価格 --}}
            <div class="form-group">
                <label for="price">価格</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            {{-- 在庫 --}}
            <div class="form-group">
                <label for="stock_quantity">在庫数</label>
                <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" required>
            </div>

            {{-- サイズ --}}
            <div class="form-group">
                <label for="size">サイズ</label>
                <select name="size" id="size" class="form-control">
                    <option value="">選択してください</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="110">110</option>
                    <option value="120">120</option>
                    <option value="130">130</option>
                    <option value="140">140</option>
                    <option value="150">150</option>
                    <option value="160">160</option>
                </select>
            </div>

            {{-- カラー --}}
            <div class="form-group">
                <label for="color">カラー</label>
                <select name="color" id="color" class="form-control">
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Blue">Blue</option>
                    <option value="Red">Red</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Brown">Brown</option>
                </select>
            </div>

            {{-- 画像 --}}
            <div class="form-group">
                <label for="image">画像パス</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="d-flex align-items-center mt-3">
                {{-- 送信 --}}
                <button type="submit" class="btn btn-primary" style="margin-right: 20px;">登録する</button>
                {{-- 戻る --}}
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>

    </div>
</div>
@endsection