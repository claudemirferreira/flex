<?php namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Request;
use App\Curso;

class CursoController extends Controller{

    public function lista(){
	    $lista = Curso::all();
	    return view('curso.listagem')->with('lista', $lista);
	}

    public function mostra($id){
	    $objeto = Curso::find($id);
	    if(empty($objeto)) {
	        return "Esse curso não existe";
	    }
	    return view('curso.detalhes')->with('p', $objeto);
	}

	public function novo(){
	  return view('curso/formulario');
	}

	public function adiciona(){

		$params = Request::all();
    	$objeto = new Curso($params);
	    $objeto->data_criacao = $datahora=date('Y-m-d h:i:s');
	    $objeto->save();

	    return redirect()
	        ->action('CursoController@lista')
	        ->withInput(Request::only('nome'));
	}

	public function listaJson(){
	    $lista = Curso::all();
	    return response()->json($lista);
	}

	public function remove($id){
	    $objeto = Curso::find($id);
	    $objeto->delete();
	    return redirect()
	        ->action('CursoController@lista');
	}

}