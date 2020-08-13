<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Curso

Route::get('/curso/listagem', 'CursoController@lista');

Route::get('/curso/mostra/{id?}', 'CursoController@mostra')->where('id', '[0-9]+');

Route::get('/curso/novo', 'CursoController@novo');

Route::post('/curso/adiciona', 'CursoController@adiciona');

Route::get('/curso/json', 'CursoController@listaJson');

Route::get('/curso/xml', 'CursoController@xml');

Route::get('/curso/remove/{id}', 'CursoController@remove');

// Aluno
Route::get('/aluno/listagem', 'AlunoController@lista');

Route::get('/aluno/mostra/{id?}', 'AlunoController@mostra')->where('id', '[0-9]+');

Route::get('/aluno/novo', 'AlunoController@novo');

Route::post('/aluno/adiciona', 'AlunoController@adiciona');

Route::get('/aluno/json', 'AlunoController@listaJson');

Route::get('/aluno/remove/{id}', 'AlunoController@remove');

Route::get('/aluno/cep/{cep?}', 'AlunoController@cep');

Route::get('/aluno/buscarCep', 'AlunoController@buscarCep');

Route::get('/aluno/pesquisarCep/{cep?}', 'AlunoController@pesquisarCep');

// professor
Route::get('/professor/listagem', 'ProfessorController@lista');

Route::get('/professor/mostra/{id?}', 'ProfessorController@mostra')->where('id', '[0-9]+');

Route::get('/professor/novo', 'ProfessorController@novo');

Route::post('/professor/adiciona', 'ProfessorController@adiciona');

Route::get('/professor/json', 'ProfessorController@listaJson');

Route::get('/professor/remove/{id}', 'ProfessorController@remove');

//
Route::get('/nfe', 'NFeController@index');

Route::get('/nfe/xml', 'NFeController@listaXml');

Route::get('/nfe/store', 'NFeController@store');
