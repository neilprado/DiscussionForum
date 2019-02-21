@extends('layouts.app')

@section('content')
  <h1 class="mt-2">Lista de Parentes</h1>
  <a href="{{url("relatives/create")}}" class="btn btn-primary mt-2 mb-3">Cadastrar Parente</a>
  <a href="{{url("tree")}}" class="btn btn-success mt-2 mb-3">Árvore Genealógica</a>

  @if (count($relatives) > 0)
      <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Vida</th>
                <th>Pai</th>
                <th>Mãe</th>
                <th>Marido/Esposa</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($relatives as $rel)
            <tr>
                <td>{{ $rel->name }}</td>
                <td>{{ $rel->birth_year }} - {{ $rel->death_year }}</td>
                <td>
                    @if($rel->father)
                        {{ $rel->father->name }}
                    @endif
                </td>
                <td>
                    @if($rel->mother)
                        {{ $rel->mother->name }}
                    @endif
                </td>
                <td>
                    @if($rel->husband)
                        {{ $rel->husband->name }}
                    @elseif($rel->wife)
                        {{ $rel->wife->name }}
                    @endif
                </td>
                <td>
                    <a href="{{ url('relatives/'.$rel->id.'/edit') }}" class="btn btn-primary">Editar</a>
                </td>
                <td>
                    {{ Form::open(['action' => ['RelativesController@destroy', $rel->id], 'method' => 'POST', 'class' => 'form-inline']) }}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Apagar', ['class' => 'btn btn-danger ml-2'])}}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- <p>
        {{ $genogram }}
    </p> --}}

  @else
    <p class="card-text">Não há nenhum parente cadastrado</p>
  @endif
  
@endsection