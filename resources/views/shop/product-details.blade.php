@extends('layouts.app')

@section('title', $product['name'])

@section('content')
  <h1>{{ $product['name'] }}</h1>
  @if($product['on_sale'])
    <span class="badge">Sale</span>
  @endif
  <p>Price: ${{ number_format($product['price'], 2) }}</p>
  <p>{{ $product['description'] }}</p>
  <a href="{{ route('cart') }}">Go to cart</a>
@endsection
