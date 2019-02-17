@extends('layouts.app')

@section('content')
  {!!Form::open(['action' => 'PostsController@filterPosts', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('title', 'Pesquisar')}}
      {!!Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Pesquise seu post aqui']) !!}
      {{Form::submit('Pesquisar', ['class' => 'btn btn-primary'])}}
    </div>
  <h1 class="mt-2">Lista de Posts</h1>
  @if (!Auth::guest())
    <a href="{{url('posts/create')}}" class="btn btn-primary mt-2 mb-3">Criar Post</a>   
  @endif 
    @forelse ($posts as $p)
        <div class="card mt-3">
          <div class="card-body">
            <a href="{{url("/posts/$p->id")}}">
              <p class="card-text">{{$p->title}}</p>
            </a>
          </div>
        </div>
        @empty
         <p class="card-text">Não há posts cadastrados</p>
    @endforelse
@endsection