@extends('layouts.app')

@section('content')
  {!!Form::open(['action' => 'ThemesController@filterThemes', 'method' => 'POST']) !!} 
      <div class="form-inline my-2 my-lg-0">
        {!!Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Pesquise seu post aqui']) !!}
        {{Form::submit('Pesquisar', ['class' => 'btn btn-outline-primary my-2 my-sm-0'])}}
      </div>
    {{Form::close()}}
  <h1 class="mt-2">Lista de Temas</h1>
  @if (!Auth::guest())
    <a href="{{url("/temas/create")}}" class="btn btn-primary mt-2 mb-3">Criar Tema</a>
  @endif
  @if (count($themes) > 0)
    @foreach ($themes as $t)
      <div class="card mt-3">
        <div class="card-body">
           <a href="{{url("/temas/$t->id")}}">
            <p class="card-text">{{$t->name}}</p>
          </a>
        </div>
      </div>
    @endforeach
  @else
    <p class="card-text">Não há temas cadastrados ainda</p>
  @endif
  
@endsection