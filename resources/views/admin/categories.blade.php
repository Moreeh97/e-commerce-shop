@extends('layouts.app')

@section('title','Admin - Categories')

@section('content')
<h1>Categories</h1>
<ul>
  @foreach($categories as $cat)
    <li>{{ $cat->name }} ({{ $cat->products_count }} products)</li>
  @endforeach
</ul>
@endsection
