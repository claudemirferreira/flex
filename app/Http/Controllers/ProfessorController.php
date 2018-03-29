<?php namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SomeApi;
use Request;
use App\Professor;

class ProfessorController extends Controller
{    
	

	public function lista(){
	    $lista = Professor::all();
	    return view('professor.listagem')->with('lista', $lista);
	}

    public function mostra($id){
	    $objeto = Professor::find($id);
	    if(empty($objeto)) {
	        return "Esse professor não existe";
	    }
	    return view('professor.detalhes')->with('p', $objeto);
	}

	public function novo(){
	  return view('professor/formulario');
	}

	public function adiciona(){

		$params = Request::all();
    	$objeto = new Professor($params);
	    $objeto->data_criacao = $datahora=date('Y-m-d h:i:s');
	    $objeto->data_nascimento = $datahora=date('Y-m-d h:i:s');
	    $objeto->save();

	    return redirect()
	        ->action('ProfessorController@lista')
	        ->withInput(Request::only('nome'));
	}

	public function listaJson(){
	    $lista = Professor::all();
	    return response()->json($lista);
	}

	public function remove($id){
	    $objeto = Professor::find($id);
	    $objeto->delete();
	    return redirect()
	        ->action('ProfessorController@lista');
	}


}