@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
<h1>ユーザー編集</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        {{-- 編集フォーム --}}
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- 名前 --}}
            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>
            {{-- メール --}}
            <div class="form-group">
                <label>メール</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>
            {{-- 住所 --}}
            <div class="form-group">
                <label>住所</label>
                <input type="text" name="address" value="{{ $user->address }}" class="form-control">
            </div>
            {{-- 電話番号 --}}
            <div class="form-group">
                <label>電話番号</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
</div>
@endsection