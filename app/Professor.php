<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';
    
    public $timestamps = false;

    protected $fillable = array('nome', 'data_nascimento', 'data_criacao');
}
