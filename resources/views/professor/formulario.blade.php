@extends('layout.principal')

@section('conteudo')

<h2>Cadastro de Professor</h2>
  <form action="/professor/adiciona" method="post">
  	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  	<div class="row">
	    <div class="form-group col-7">
	      <label for="nome">Nome:</label>
	      <input type="text" class="form-control" id="nome" placeholder="Enter nome" name="nome">
	    </div>
	    <div class="form-group col-3">
	      <label for="data_nascimento">Data:</label>
	       <input name="data" type="text" value="{{ old('data_nacimento') }}"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
	    </div>	    
    </div>

    <button type="submit" class="btn btn-primary">
      <span class="glyphicon glyphicon-floppy-disk"> </span> Salvar
    </button>

  </form>
@stop