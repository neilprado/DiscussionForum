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
  @if (!Auth::guest())
    <h4 class="text-center mt-3 mb-2">Deixe seu comentário</h4>
    {!!Form::open(['action' => array('CommentsController@update', $post->id), 'method' => 'PATCH'])!!}
      <div class="form-group">
        {{Form::label('response', 'Comentário')}}
        {{Form::textarea('response', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Digite aqui seu comentário'])}}
      </div>
      {{Form::submit('Comentar', ['class' => 'btn btn-primary mb-2'])}}
      {!!Form::close()!!}
    @endif
  @forelse ($post->comments()->get() as $comment)
    <div class="card text-center mt-2">
      <div class="card-header">
        <h5>{{$comment->user()->first()->name}}</h5>
      </div>
      <div class="card-body">
        <p class="card-text text-left">{!!$comment->response!!}</p>
      </div> 
      <div class="card-footer text-muted">
        <small>{{$comment->created_at}}</small>
      </div>
    </div>
  @empty
      <div class="card-text mt-3 text-center">Ainda não há comentários para este post. Seja você o primeiro</div>
  @endforelse

  
@endsection