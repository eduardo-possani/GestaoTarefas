<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\SubtarefaController;

$router->group(['prefix' => 'api'], function () use ($router) {
    // Rotas para TarefaController
    $router->get('/busca', 'TarefaController@busca');
    $router->post('/criar', 'TarefaController@create');
    $router->put('/atualizar/{id}', 'TarefaController@update');
    $router->delete('/deletar/{id}', 'TarefaController@apreensao');

    // Rotas para SubtarefasController
    $router->get('/buscasub', 'SubtarefaController@busca');
    $router->post('/criarsub', 'SubtarefaController@create');
    $router->put('/atualizasub/{id}', 'SubtarefaController@update');
    $router->delete('/deletasub/{id}', 'SubtarefaController@apreensao');
});