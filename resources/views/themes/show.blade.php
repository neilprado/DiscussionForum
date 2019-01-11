@extends('layouts.app')
@section('content')
  <a href="/projeto/DiscussionForum/public/temas/{{$theme->id}}/edit" class="btn btn-dark">Editar</a>
  {!!Form::open(['action' => ['ThemesController@destroy', $theme->id], 'method' => 'POST'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Apagar', ['class' => 'btn btn-danger'])}}
  {!! Form::close()!!}
  <div class="card">
    <div class="card-text">
      <h5>{{$theme->name}}</h5>
    </div>
  </div>
    
@endsection