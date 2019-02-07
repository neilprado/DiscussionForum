@extends('layouts.app')

@section('content')
  <h1 class="mt-2">Lista de Posts</h1>
  <a href="{{url('posts/create')}}" class="btn btn-primary mt-2 mb-3">Criar Post</a>   
  @if (count($posts) > 0)
    @foreach ($posts as $p)
        <div class="card mt-3">
          <div class="card-body">
            <a href="{{url("/posts/$p->id")}}">
              <p class="card-text">{{$t->name}}</p>
            </a>
          </div>
        </div>
    @endforeach
  @else
    <p class="card-text">Não há posts cadastrados</p>
  @endif
@endsection