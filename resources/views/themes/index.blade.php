@extends('layouts.app')

@section('content')
  <h1 class="mt-2">Lista de Temas</h1>
  <a href="/projeto/DiscussionForum/public/temas/create" class="btn btn-primary mt-2 mb-3">Criar Tema</a>
  @if (count($themes) > 0)
    @foreach ($themes as $t)
      <div class="card mt-3">
        <div class="card-body">
          <a href="/projeto/DiscussionForum/public/temas/{{$t->id}}">
            <p class="card-text">{{$t->name}}</p>
          </a>
        </div>
      </div>
    @endforeach
  @else
    <p class="card-text">Não há temas cadastrados ainda</p>
  @endif
  
@endsection