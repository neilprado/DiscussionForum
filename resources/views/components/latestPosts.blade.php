<h2>Últimos Posts</h2>
@forelse ($posts as $p)
<div class="card">
  <div class="card-body">
    <a href="{{url("/posts/$p->id")}}"><p>{{$p->title}}</p></a>
  </div>
</div>
@empty
<div class="card-body">
  <p>Não há posts cadastrados</p>
</div>  
@endforelse