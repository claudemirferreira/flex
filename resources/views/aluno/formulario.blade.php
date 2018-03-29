@extends('layout.principal')

@section('conteudo')

<h2>Cadastro de Aluno</h2>
  <form action="/aluno/adiciona" method="post">
  	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  	<div class="row">
	    <div class="form-group col-5">
	      <label for="nome">Nome:</label>
	      <input type="text" class="form-control" id="nome" placeholder="Enter nome" name="nome">
	    </div>
	    <div class="form-group col-5">
	      <label for="logradouro">Logradouro:</label>
	      <input type="text" class="form-control" id="logradouro" placeholder="Enter logradouro" name="logradouro">
	    </div>
	    <div class="form-group col-2">
	      <label for="numero">Numero:</label>
	      <input type="text" class="form-control" id="numero" placeholder="Enter numero" name="numero">
	    </div>
    </div>

    <div class="row">
	    <div class="form-group col-5">
	      <label for="bairro">Bairro:</label>
	      <input type="text" class="form-control" id="nome" placeholder="Enter bairro" name="bairro">
	    </div>
	    <div class="form-group col-5">
	      <label for="cidade">Cidade:</label>
	      <input type="text" class="form-control" id="cidade" placeholder="Enter cidade" name="cidade">
	    </div>
	    <div class="form-group col-2">
	      <label for="estado">Estado:</label>
	      <input type="text" class="form-control" id="estado" placeholder="Enter estado" name="estado">
	    </div>
    </div>

   	<div class="row">
	    <div class="form-group col-2">
	      <label for="cep">Cep:</label>
	      <input type="text" class="form-control" id="cep" placeholder="Enter cep" name="cep" >
	    </div>	    
    </div>    

    <button type="submit" class="btn btn-primary">
      <span class="glyphicon glyphicon-floppy-disk"> </span> Salvar
    </button>
    
  </form>

@stop