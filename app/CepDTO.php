<?php

namespace App;


class CepDTO 
{
    public $cep;
	public $logradouro;
	public $complemento;

	public $bairro;
	public $localidade;
	public $unidade;

	public $ibge;
	public $gia;

	function CepDTO(){
		$this->$cep = "99999999";
	}

}