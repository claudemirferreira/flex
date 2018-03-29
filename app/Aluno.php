<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';
    
    public $timestamps = false;

    protected $fillable = array('nome', 'data_nascimento', 'logradouro', 'numero', 'bairro', 'cidade', 'estado', 'data_criacao', 'cep');
}