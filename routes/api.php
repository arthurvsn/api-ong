<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'usuario'], function() {
    
    Route::post('login', 'UsuarioController@loginUsuario');

    Route::middleware('auth:api')->group(function () {

        Route::get('/', 'UsuarioController@index');

        Route::post('/', 'UsuarioController@cadastrar');
    });

});

Route::middleware('auth:api')->group(function () {
    Route::group(['prefix' => 'servico'], function() {

        Route::get('/', 'ServicoController@index');
        Route::get('{servico}', 'ServicoController@obterServico');

        Route::post('/', 'ServicoController@cadastrar');
        
        Route::put('{servico}', 'AgendamentoController@editar');

        Route::delete('{servico}', 'AgendamentoController@deletar');


    });

    Route::group(['prefix' => 'agendamento'], function() {

        Route::get('/', 'AgendamentoController@index');
        Route::get('/{agendamento}', 'AgendamentoController@obterAgendamento');

        Route::post('/', 'AgendamentoController@cadastrar');

        Route::put('{agendamento}', 'AgendamentoController@editar');

        Route::delete('{agendamento}', 'AgendamentoController@deletar');

    });
});
