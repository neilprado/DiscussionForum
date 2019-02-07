@extends('layouts.app')

@section('content')
  <h1>Editar post</h1>
  {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Título')}}
      {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Título do Post'])}}
    </div>
    <div class="form-group">
      {{Form::label('message', 'Descrição')}}
      {{Form::textarea('message', $post->message, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descreva aqui seu post'])}}
    </div>
    <div class="form-group">
        {{Form::file('image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Criar', ['class' => 'btn btn-primary float-right'])}}
  {!! Form::close() !!} 
@endsection