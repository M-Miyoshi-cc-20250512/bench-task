@extends('layouts.app')

@section('title', 'Log Out')

@section('content')
<div class="logout-container" style="max-width: 400px; margin: 50px auto; text-align: center;">
    <h2>Are you sure you want to log out?</h2>

    <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" style="
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        ">Log Out</button>
    </form>

    <a href="/" style="display:block; margin-top:20px; color: #555;">
        Cancel and go back to Home
    </a>
</div>
@endsection