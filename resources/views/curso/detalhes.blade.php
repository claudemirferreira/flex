@extends('layout.principal')

@section('conteudo')

<h3>Detalhe do Curso</h3>
  <form >
  	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  	<div class="row">
	    <div class="form-group col-5">
	      <label for="nome">Nome:</label>
	      <input type="text" class="form-control" id="nome" readonly="true" placeholder="Enter nome" name="nome" value="<?= $p->nome ?>" >
	    </div>	    
    </div>
    
    <a href="{{action('CursoController@lista')}}"><span class="glyphicon glyphicon-arrow-left
" aria-hidden="true"> Voltar</a>
  </form>
@stop