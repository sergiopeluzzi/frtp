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
Route::get('/associados/cadastro', ['as' => 'associados.create', 'uses' => 'AssociadosController@create']);
Route::get('/associados/salvar', ['as' => 'associados.store', 'uses' => 'AssociadosController@store']);