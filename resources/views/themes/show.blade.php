@extends('layouts.app')
@section('content')
  <div class="row mt-4">
    <a href="/projeto/DiscussionForum/public/temas/{{$theme->id}}/edit" class="btn btn-dark mb-3 ml-3">Editar</a>
  {!!Form::open(['action' => ['ThemesController@destroy', $theme->id], 'method' => 'POST'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Apagar', ['class' => 'btn btn-danger ml-2'])}}
  {!! Form::close()!!}
  </div>
  <div class="card">
    <div>
      <p class="card-text">{{$theme->name}}</p>
    </div>
  </div>
  <a href="/projeto/DiscussionForum/public/temas" class="btn btn-primary mt-3 float-right">Voltar</a>

    
@endsection