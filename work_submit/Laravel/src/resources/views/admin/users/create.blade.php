@extends('adminlte::page')

@section('title', 'ユーザー新規登録')

@section('content_header')
    <h1>ユーザー新規登録</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            {{-- 名前 --}}
            <div class="form-group">
                <label>名前</label>
                <input type="text" name="name" class="form-control">
            </div>

            {{-- メールアドレス --}}
            <div class="form-group">
                <label>メール</label>
                <input type="email" name="email" class="form-control">
            </div>

            {{-- パスワード --}}
            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" class="form-control">
            </div>

            {{-- 住所 --}}
            <div class="form-group">
                <label>住所</label>
                <input type="text" name="address" class="form-control">
            </div>

            {{-- 電話番号 --}}
            <div class="form-group">
                <label>電話番号</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">登録する</button>
        </form>

    </div>
</div>
@endsection