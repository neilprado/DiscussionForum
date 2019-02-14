@extends('layouts.app')
@section('content')
@if (!Auth::guest())
  @if (Auth::user()->id == $post->user_id)
  <div class="row mt-4">
    <a href="{{url("/posts/$post->id/edit")}}" class="btn btn-dark mb-3 ml-3">Editar</a>
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Apagar', ['class' => 'btn btn-danger ml-2'] )}}
    {!!Form::close() !!}
  </div>
    @endif
  @endif
  <div class="card">
    <div class="card-header p-3">
      <h2>{{$post->title}}</h2>
      <h5>{{$post->theme()->first()->name}}</h5>
      <img style="width: 50%;" src="/forum/DiscussionForum/storage/img/{{$post->image}}" alt="Imagem do post!!">
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <h5>{!!$post->message!!}</h5>
      </blockquote>
    </div> 
    <div class="card-footer">
      <small>Escrito por:{{$post->user()->first()->name}} em {{$post->created_at->format('d/m/Y - H:i:s')}}</small>
      <a href="{{url("/posts")}}" class="btn btn-primary float-right">Voltar</a>
    </div>
  </div>
  
  <div class="row mt-4">
    <h5>Comentar</h5>
    {!!Form::open(['action' => 'CommentsController@store', 'method' => 'POST'])!!}
      <div class="form-group">
        {{Form::label('response', 'Comentário')}}
        {{Form::textarea('response', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Digite aqui seu comentário'])}}
      </div>
      {{Form::submit('Comentar', ['class' => 'btn btn-primary'])}}
    {{Form::close()}}
  </div>
  @forelse ($post->comments()->get() as $comment)
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{$comment->user()->first()->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$comment->created_at}}</h6>
        <p class="card-text">{{$comment->response}}</p>
        @if (Auth::user_id == $comment->user_id)
          <a href="#" class="btn btn-dark">Editar</a>
        @endif
      </div>
    </div>
      
  @empty
      <p>Ainda não há comentários para este post. Seja você o primeiro</p>
  @endforelse
@endsection