@extends('layouts.app')

@section('title','Create Product')

@section('content')
<div class="container">
  <h1>Create Product</h1>

  @if($errors->any())
    <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
      <label>SKU</label>
      <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
    </div>
    <div class="mb-3">
      <label>Price</label>
      <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price',0) }}" required>
    </div>
    <div class="mb-3">
      <label>Stock</label>
      <input type="number" name="stock" class="form-control" value="{{ old('stock',0) }}" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
      <label>Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-success">Save</button>
  </form>
</div>
@endsection
