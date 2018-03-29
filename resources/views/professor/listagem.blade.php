@extends('layout.principal')

@section('conteudo')

<div class="row">
  <div class="col-9">
    <h3>Listagem de Professores</h3>
  </div>
  <div class="col-3">  
      <a href="/curso/novo" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
  </div>
</div>

 @if(empty($lista))
  <div>Você não tem nenhum curso cadastrado.</div>

 @else
  <table class="table table-striped table-bordered table-hover">
    
    <thead>
        <tr>
            <th class="col-sm-10">Nome</th>
            <th class="col-sm-2">Ação</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($lista as $p)
      <tr>
        <td> {{$p->nome}} </td>
        <td>

          <a href="/professor/mostra/{{$p->id}}" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
          <a href="{{action('ProfessorController@remove', $p->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>

        </td>
      </tr>
      @endforeach
   </tbody>
  </table>

  @endif
@stop