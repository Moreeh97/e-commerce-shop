@extends('layouts.app')

@section('title','Admin - Products')

@section('content')
<h1>Products</h1>
<table>
  <thead>
    <tr><th>#</th><th>Name</th><th>Category</th><th>Price</th><th>Actions</th></tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->category?->name ?? '-' }}</td>
      <td>${{ number_format($product->price,2) }}</td>
      <td>
        @can('update', $product)
          <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
        @endcan

        @can('delete', $product)
          <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
          </form>
        @endcan
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $products->links() }}
@endsection
