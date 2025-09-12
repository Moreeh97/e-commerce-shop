@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')
<h1>Admin Dashboard</h1>
<p>Products: {{ $productCount }}</p>
<p>Categories: {{ $categoryCount }}</p>
@endsection
