@extends('layouts.app')

@section('content')
    <h2>Criar Novo tema</h2>
    {!!Form::open(['action' => 'ThemesController@store', 'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome do Tema'])}}
      </div>
      {{Form::submit('Criar', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection