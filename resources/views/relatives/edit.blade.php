@extends('layouts.app')

@section('content')
    <h2>Editar Parente</h2>
    {!! Form::open(['action' => ['RelativesController@update', $relative->id], 'method' => 'PATCH']) !!}
      <div class="form-group">
        {{Form::label('name', 'Nome')}}
        {{Form::text('name', $relative->name, ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('birth_year', 'Ano Nascimento')}}
        {{Form::number('birth_year', $relative->birth_year, ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('death_year', 'Ano Morte')}}
        {{Form::number('death_year', $relative->death_year, ['class' => 'form-control'])}}
      </div>

      <div class="form-group">
        {{ Form::label('mother_relative_id', 'Mãe') }}
        {{ Form::select('mother_relative_id', $relatives, $relative->mother_relative_id, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>

      <div class="form-group">
        {{ Form::label('father_relative_id', 'Pai') }}
        {{ Form::select('father_relative_id', $relatives, $relative->father_relative_id, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>

      <div class="form-group">
        {{ Form::label('husband_relative_id', 'Marido') }}
        {{ Form::select('husband_relative_id', $relatives, $relative->husband_relative_id, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>

      <div class="form-group">
        {{ Form::label('wife_relative_id', 'Esposa') }}
        {{ Form::select('wife_relative_id', $relatives, $relative->wife_relative_id, ['class' => 'form-control', 'placeholder' => '' ]) }}
      </div>
      
      {{Form::submit('Salvar', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
@endsection