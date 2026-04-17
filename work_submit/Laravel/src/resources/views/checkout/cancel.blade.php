@extends('layouts.app')

@section('content')

<h1>Payment canceled</h1>
<p>Try again</p>

<a href="{{ route('cart.index') }}">back to the shopping cart</a>

@endsection