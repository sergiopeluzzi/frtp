<?php

use frtp\Models\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', function() {
    return view('index');
}]);



Route::get('/associados', ['as' => 'associados.index', 'uses' => 'AssociadosController@index']);
Route::get('/interno/associados/cadastro', ['as' => 'interno.associados.create', 'uses' => 'AssociadosController@create']);
Route::post('/associados/salvar', ['as' => 'interno.associados.store', 'uses' => 'AssociadosController@store']);
Route::get('edit/{CPF}', ['as' => 'interno.associados.edit', 'uses' => 'AssociadosController@edit']);
Route::put('update/{CPF}', ['as' => 'interno.associados.update', 'uses' => 'AssociadosController@update']);

Route::get('/login', ['as' => 'login.index', 'uses' => 'LoginController@index']);
Route::get('/login/create', ['as' => 'login.create', 'uses' => 'LoginController@create']);
Route::post('/login/salvar', ['as' => 'login.store', 'uses' => 'LoginController@store']);
Route::post('/login/valida', ['as' => 'login.valida', 'uses' => 'LoginController@validaLogin']);
Route::get('/login/indexRecuperaSenha', ['as' => 'login.indexRecuperaSenha', 'uses' => 'LoginController@indexRecuperaSenha']);
Route::post('/login/montaEmailRecuperaSenha', ['as' => 'login.montaEmailRecuperaSenha', 'uses' => 'LoginController@montaEmailRecuperaSenha']);
Route::get('/login/recuperaSenha', ['as' => 'login.recuperaSenha', 'uses' => 'LoginController@recuperaSenha']);
Route::post('/login/alteraSenha', ['as' => 'login.alteraSenha', 'uses' => 'LoginController@alteraSenha']);

Route::get('/interno/eventos', ['as' => 'interno.eventos.index', 'uses' => 'EventosController@index']);
Route::post('/interno/eventos/efetuarInscricao/{id}', ['as' => 'interno.eventos.efetuarInscricao', 'uses' => 'EventosController@efetuarInscricao']);
Route::get('/interno/eventos/gerarBoleto/{id}', ['as' => 'interno.eventos.gerarBoleto', 'uses' => 'EventosController@gerarBoleto']);
Route::get('/interno/financeiro', ['as' => 'interno.financeiro.index', 'uses' => 'FinanceiroController@index']);
