@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
    <style>
  body{
    background-color:#00CCFF;
  }
</style>
      <h5>{{ $title }}</h5>

      <p>Selamat datang {{ auth()->user()->nama }}</p>
    </div>
  </div>
</div>
@endsection
