@extends('layouts.app')

@section('content')
<h1 class="mt-2">Lista Personalizada</h1>
    <a href="{{url('temas/')}}" class="btn btn-primary mt-2 mb-3">Voltar</a>   
    @forelse ($themes as $t)
        <div class="card mt-3">
          <div class="card-body">
            <a href="{{url("/temas/$t->id")}}">
              <p class="card-text">{{$t->name}}</p>
            </a>
          </div>
        </div>
        @empty
         <p class="card-text">Não há posts cadastrados</p>
    @endforelse
@endsection