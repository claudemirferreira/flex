@extends('layout.principal')

@section('conteudo')

<h3>Detalhe do Aluno</h3>
  <form action="/aluno/adiciona" method="post">
  	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  	<div class="row">
	    <div class="form-group col-5">
	      <label for="nome">Nome:</label>
	      <input type="text" class="form-control" id="nome" placeholder="Enter nome" name="nome" value="<?= $p->nome ?>">
	    </div>
	    <div class="form-group col-5">
	      <label for="logradouro">Logradouro:</label>
	      <input type="text" class="form-control" id="logradouro" placeholder="Enter logradouro" name="logradouro" value="<?= $p->logradouro ?>">
	    </div>
	    <div class="form-group col-2">
	      <label for="numero">Numero:</label>
	      <input type="text" class="form-control" id="numero" placeholder="Enter numero" name="numero" value="<?= $p->numero ?>">
	    </div>
    </div>

    <div class="row">
	    <div class="form-group col-5">
	      <label for="bairro">Bairro:</label>
	      <input type="text" class="form-control" id="bairro" placeholder="Enter bairro" name="bairro" value="<?= $p->bairro ?>">
	    </div>
	    <div class="form-group col-5">
	      <label for="cidade">Cidade:</label>
	      <input type="text" class="form-control" id="cidade" placeholder="Enter cidade" name="cidade" value="<?= $p->cidade ?>">
	    </div>
	    <div class="form-group col-2">
	      <label for="estado">Estado:</label>
	      <input type="text" class="form-control" id="estado" placeholder="Enter estado" name="estado" value="<?= $p->cidade ?>">
	    </div>
    </div>

   	<div class="row">
	    <div class="form-group col-2">
	      <label for="cep">Cep:</label>
	      <input type="text" class="form-control" id="cep" placeholder="Enter cep" name="cep" value="<?= $p->cep ?>" >
	    </div>	    
    </div>    

    <button type="submit" class="btn btn-default">Salvar</button>
    
  </form>
@stop