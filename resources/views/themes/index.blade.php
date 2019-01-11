@extends('layouts.app')

@section('content')
  <h1 class="mt-2">Posts</h1>
  <a href="/projeto/DiscussionForum/public/temas/create" class="btn btn-primary mt-2 mb-3">Criar Tema</a>
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