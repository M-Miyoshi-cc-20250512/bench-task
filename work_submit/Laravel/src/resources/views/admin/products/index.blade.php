@extends('adminlte::page') {{-- AdminLTE のレイアウト --}}

@section('title', '商品一覧')

@section('content_header')
<h1>商品一覧</h1>
@endsection

@section('content')
<a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">新規追加</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫</th>
                    <th>サイズ</th>
                    <th>カラー</th>
                    <th>画像</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>¥{{ number_format($product->price) }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->color }}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">編集</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection