@extends('layouts.app')
@section('content')
  @if (!Auth::guest())
    @if (Auth::user()->id == $post->user_id)
      <a href="/forum/DiscussionForum/public/posts/{{$post->id}}/edit" class="btn btn-dark mb-1">Editar</a>
      {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Apagar', ['class' => 'btn btn-danger'] )}}
      {!!Form::close() !!}
    @endif
  @endif
  <div class="card">
    <div class="card-header p-3">
      <h2>{{$post->title}}</h2>
      <img style="width: 50%;" src="/forum/DiscussionForum/storage/img/{{$post->image}}" alt="Imagem do post!!">
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <h5>{!!$post->message!!}</h5>
      </blockquote>
    </div> 
    <div class="card-footer">
      <small>Escrito por:{{$post->user->name}} em {{$post->created_at->format('d/m/Y - H:i:s')}}</small>
    </div>
  </div>
  <a href="/forum/DiscussionForum/public/posts" class="btn btn-primary float-right mt-3">Voltar</a>
@endsection