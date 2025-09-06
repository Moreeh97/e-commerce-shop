@extends('layouts.app')

@section('title','Products')

@section('content')
  <h1>Products</h1>

  @unless(count($products))
    <p>No products currently available.</p>
  @else
    <ul>
      @foreach($products as $product)
        <li>
          <strong>#{{ $loop->index + 1 }} - {{ $product['name'] }}</strong>
          @if($loop->first)
            <span>(Featured)</span>
          @endif

          @if($product['on_sale'])
            <span class="badge">Sale</span>
          @endif

          <p>Price: ${{ number_format($product['price'], 2) }}</p>
          <p>{{ $product['description'] }}</p>
          <a href="{{ route('product.details', ['id' => $product['id']]) }}">View details</a>
        </li>
      @endforeach
    </ul>
  @endunless
@endsection
