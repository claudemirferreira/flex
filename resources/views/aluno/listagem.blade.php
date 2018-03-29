@extends('layout.principal')

@section('conteudo')

<div class="row">
  <div class="col-9">
    <h3>Listagem de Alunos</h3>
  </div>
  <div class="col-3">  
      <a href="/aluno/novo" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
  </div>
</div>

 @if(empty($lista))
  <div>Você não tem nenhum curso cadastrado.</div>

 @else
  
  <table class="table table-striped table-bordered table-hover">
    <tr>
      <td>Nome</td> <td>Logradouro</td> <td>Complemento</td> <td>Cep</td> <td>Cidade</td> <td>Localidade</td> <td>Ação</td>
    </tr>
      
    @foreach ($lista as $p)
    <tr>
      <td> {{$p->nome}} </td>
      <td> {{$p->logradouro}} </td>
      <td> {{$p->complemento}} </td>
      <td> {{$p->cep}} </td>
      <td> {{$p->cidade}} </td>
      <td> {{$p->estado}} </td>
      <td>

        <a href="/aluno/mostra/{{$p->id}}" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
        <a href="{{action('AlunoController@remove', $p->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>
          
      </td>

    </tr>
    @endforeach
  </table>

  @endif
@stop