@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="container">
  <h1>Products</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>#</th><th>Name</th><th>Price</th><th>Stock</th><th>Image</th><th>Actions</th></tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{ $loop->iteration + ($products->currentPage()-1)*$products->perPage() }}</td>
          <td>{{ $product->name }} @if($loop->first) <span class="badge bg-success">First</span>@endif</td>
          <td>${{ number_format($product->price,2) }}</td>
          <td>{{ $product->stock }}</td>
          <td>
            @if($product->image)
              <img src="{{ asset('storage/'.$product->image) }}" style="width:70px;height:auto;">
            @else
              -
            @endif
          </td>
          <td>
            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">View</a>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $products->links() }}
</div>
@endsection
