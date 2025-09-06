@extends('layouts.app')

@section('title','Contact Us')

@section('content')
<div class="container">
  <h1>Contact Us</h1>

  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

  @if($errors->any())
    <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif

  <form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <div class="mb-3"><input name="name" placeholder="Your name" value="{{ old('name') }}" class="form-control"></div>
    <div class="mb-3"><input name="email" placeholder="Your email" value="{{ old('email') }}" class="form-control"></div>
    <div class="mb-3"><input name="subject" placeholder="Subject" value="{{ old('subject') }}" class="form-control"></div>
    <div class="mb-3"><textarea name="message" placeholder="Message" class="form-control">{{ old('message') }}</textarea></div>
    <button class="btn btn-primary">Send</button>
  </form>
</div>
@endsection
