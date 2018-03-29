<?php namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Request;
use App\Curso;

class SomeApi {

    public function __construct($buzz)
    {
        $this->client = $buzz;
    }

    public function getCep()
    {
        //$data = $this->client->get('https://viacep.com.br/ws/01001000/json/');
        // Do things with data, etc etc
        $client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'https://viacep.com.br/ws/01001000/json');
		echo $res->getStatusCode();
		// 200
		echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		echo $res->getBody();
    }

}