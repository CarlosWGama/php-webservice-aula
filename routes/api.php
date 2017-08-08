<?php

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

//Login
Route::post('/login', 'UsuarioController@login');

//Usuários

//Tarefas
Route::group(['prefix' => '/tarefas', 'middleware' => 'jwt'], function() {

    
    //Busca todas tarefas
    Route::get('/', 'TarefaController@todas');

    //Cadastrar tarefa
    Route::post('/', 'TarefaController@cadastrar');

    //Excluir tarefa
    Route::delete('/{id}', 'TarefaController@excluir');
        
});
