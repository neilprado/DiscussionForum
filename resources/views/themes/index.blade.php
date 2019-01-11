@extends('layouts.app')

@section('content')
  <h1>Posts</h1>
  @if (count($themes) > 0)
    @foreach ($themes as $t)
      <div class="card mt-3">
        <div class="card-body">
          <p class="card-text">{{$t->name}}</p>
        </div>
      </div>
    @endforeach
  @else
    <p class="card-text">Não há temas cadastrados ainda</p>
  @endif
  
@endsection