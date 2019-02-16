<h2>Últimos temas</h2>
@forelse ($themes as $t)
<div class="card">
  <div class="card-body">
    <p>{{$t->name}}</p>
  </div>
</div>
@empty
<div class="card-body">
  <p>Não há temas cadastrados</p>
</div>  
@endforelse
  