@extends('layouts.app')

@section('content')
    <h2>Cadastrar Parente</h2>
    {!! Form::open(['action' => 'RelativesController@store', 'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('birth_year', 'Ano Nascimento')}}
        {{Form::number('birth_year', '', ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('death_year', 'Ano Morte')}}
        {{Form::number('death_year', '', ['class' => 'form-control'])}}
      </div>

      <div class="form-group">
        {{ Form::label('mother_relative_id', 'Mãe') }}
        {{ Form::select('mother_relative_id', $relatives, null, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>

      <div class="form-group">
        {{ Form::label('father_relative_id', 'Pai') }}
        {{ Form::select('father_relative_id', $relatives, null, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>

      <div class="form-group">
        {{ Form::label('husband_relative_id', 'Marido') }}
        {{ Form::select('husband_relative_id', $relatives, null, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>

      <div class="form-group">
        {{ Form::label('wife_relative_id', 'Esposa') }}
        {{ Form::select('wife_relative_id', $relatives, null, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>
      
      {{Form::submit('Cadastrar', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
@endsection