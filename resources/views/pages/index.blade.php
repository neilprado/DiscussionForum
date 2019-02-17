@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>
      <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
      <a href="{{url('/register')}}" class="btn btn-primary">Registro</a>
    </p>
  </div>
  <div class="mb-4">
    @include('components.latestThemes', ['themes' => $themes])
  </div>
  <div class="mt-3">
    @include('components.latestPosts')
  </div>
@endsection