@extends('layout.principal')

@section('conteudo')

<h2>Cadastro de Curso</h2>
  <form action="/curso/adiciona" method="post">
  	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  	<div class="row">
	    <div class="form-group col-5">
	      <label for="nome">Nome:</label>
	      <input type="text" class="form-control" id="nome" placeholder="Enter nome" name="nome">
	    </div>	    
    </div>

    <button type="submit" class="btn btn-primary">
      <span class="glyphicon glyphicon-floppy-disk"> </span> Salvar
    </button>

  </form>
@stop