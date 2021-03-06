@extends('layouts.app')
@section('content')
@if (!Auth::guest())
  @if (Auth::user()->id == $theme->user_id)
    <div class="row mt-4">
      <a href="{{url("/temas/$theme->id/edit")}}" class="btn btn-dark mb-3 ml-3">Editar</a>
    {!!Form::open(['action' => ['ThemesController@destroy', $theme->id], 'method' => 'POST'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Apagar', ['class' => 'btn btn-danger ml-2'])}}
    {!! Form::close()!!}
    </div>
  @endif
@endif
  <div class="card">
    <div>
      <p class="card-text">{{$theme->name}}</p>
    </div>
  </div>
  <a href="{{url("/temas")}}" class="btn btn-primary mt-3 float-right">Voltar</a>

  <div class="row mt-5">
    @forelse ($theme->posts()->get() as $post)
        <div class="card mr-2">
          <div class="card-body">
            <a href="{{url("/posts/$post->id")}}">
              <p class="card-text">{!!$post->title!!}</p>
            </a>
            <p class="card-text">{!!$post->message!!}</p>
          </div>
        </div>
    @empty
        
    @endforelse
  </div>

    
@endsection