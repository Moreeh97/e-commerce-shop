@extends('layouts.app')

@section('title','About Us')

@section('content')
  <h1>{{ $title }}</h1>
  <p>{{ $description }}</p>

  {!! $rawHtml !!}

  @php
    echo '<p>Current year: ' . date('Y') . '</p>';
  @endphp
@endsection
