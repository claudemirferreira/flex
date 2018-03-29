<?php namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SomeApi;
use Request;
use App\Aluno;
use App\CepDTO;

class AlunoController extends Controller
{

	public function buscarCep(Request $request)
    {
        $id = $request->Input('$cep');
        var_dump($id);
    }

	// ncomo faço para recuperar o CEP digitado na tela
	public function qqq(Request $request){
			
		//$cep = $request->query('cep');
		//$cep = $request->input('cep');
		//$cep = Input::get('cep');
		$cep = $_REQUEST['username'];
		//$cep =  $_GET["cep"];
		$p1 = 'https://viacep.com.br/ws/';
		$p2 = '/json/';
		$url = "$p1$cep$p2";
	    $client = new \GuzzleHttp\Client();
		$request = $client->get($url);
		$response = $request->getBody();

		echo $cep;
		//return $response;
	}

	public function cep($cep){
		$p1 = 'https://viacep.com.br/ws/';
		$p2 = '/json/';
		$url = "$p1$cep$p2";

	    $client = new \GuzzleHttp\Client();
		$request = $client->get($url);
		$response = $request->getBody();

		return $response;
	}	

	public function lista(){
	    $lista = Aluno::all();
	    return view('aluno.listagem')->with('lista', $lista);
	}

    public function mostra($id){
	    $objeto = Aluno::find($id);
	    if(empty($objeto)) {
	        return "Esse aluno não existe";
	    }
	    return view('aluno.detalhes')->with('p', $objeto);
	}

	public function novo(){
		$objeto = new Aluno();
		$objeto->cep = '01001000';
		$cep = '01001000';
		//echo $objeto;
		//$objeto.cep $p_cep;
	  return view('aluno/formulario')->with('cep', $cep);;
	}

	public function obterCep($cep){		
		
		$p1 = 'https://viacep.com.br/ws/';
		$p2 = '/json/';
		$url = "$p1$cep$p2";

	    $client = new \GuzzleHttp\Client();
		$request = $client->get($url);
		$response = $request->getBody();

		return $response;
	}

	public function adiciona(){
		
		$cep = $_POST['cep'];
		$p1 = 'https://viacep.com.br/ws/';
		$p2 = '/json/';
		$url = "$p1$cep$p2";

	    $client = new \GuzzleHttp\Client();
		$request = $client->get($url);
		$response = $request->getBody();

		$json = json_decode($response);
		
		$params = Request::all();
    	$objeto = new Aluno($params);
	    $objeto->data_criacao = $datahora=date('Y-m-d h:i:s');
	    $objeto->data_nascimento = $datahora=date('Y-m-d h:i:s');
	    $objeto->logradouro = $json->logradouro;
	    $objeto->bairro = $json->bairro;
	    $objeto->cidade = $json->localidade;
	    $objeto->estado = $json->uf;
	    $objeto->save();

	    return redirect()->action('AlunoController@lista')->withInput(Request::only('nome'));
	}

	public function listaJson(){
	    $lista = Aluno::all();
	    return response()->json($lista);
	}

	public function remove($id){
	    $objeto = Aluno::find($id);
	    $objeto->delete();
	    return redirect()
	        ->action('AlunoController@lista');
	}

	/*
	public function cep(){
		$p1 = 'https://viacep.com.br/ws/';
		$p2 = '/json/';
		//$url = "$p1$cep$p2";

	    $client = new \GuzzleHttp\Client();
		$request = $client->get('https://viacep.com.br/ws/01001000/json/');
		$response = $request->getBody();

		return $response;
	}*/

		
}