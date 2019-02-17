@extends('layouts.app')

@section('content')
<h1 class="mt-2">Lista Personalizada</h1>
    <a href="{{url('posts/')}}" class="btn btn-primary mt-2 mb-3">Voltar</a>   
    @forelse ($posts as $p)
        <div class="card mt-3">
          <div class="card-body">
            <a href="{{url("/posts/$p->id")}}">
              <p class="card-text">{{$p->title}}</p>
            </a>
          </div>
        </div>
        @empty
         <p class="card-text">Não há posts cadastrados</p>
    @endforelse
@endsection