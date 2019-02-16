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
        {{Form::label('theme_id', 'Tema')}}
        {{Form::select('theme_id', $themes, null, array('class' => 'form-control', 'placeholder' => 'Por favor escolha o tema'))}}
    	</div>
      {{Form::submit('Criar', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection