@extends('layouts.app')

@section('content')
    <h2>Criar Novo post</h2>
    {!!Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('title', 'Título')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Título do Post'])}}
      </div>
      <div class="form-group">
      {{Form::label('message', 'Descrição')}}
      {{Form::textarea('message', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descreva aqui seu post'])}}
      {{Form::select('theme_id', ['L' => 'Aqui eu passo o array', 'S' => 'Small'])}}
    	</div>
      {{Form::submit('Criar', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection