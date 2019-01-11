@extends('layouts.app')

@section('content')
    <h2>Editar tema</h2>
    {!!Form::open(['action' => ['ThemesController@update', $theme->id], 'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', $theme->name, ['class' => 'form-control', 'placeholder' => 'Nome do Tema'])}}
      </div>
      {{Form::hidden('_method', 'PUT')}}
      {{Form::submit('Editar', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection