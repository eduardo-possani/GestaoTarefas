<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\SubtarefasController;

$router->group(['prefix' => 'api'], function () use ($router) {
    // Rotas para TarefaController
    $router->get('/tarefas', 'TarefaController@busca');
    $router->post('/tarefas', 'TarefaController@create');
    $router->put('/tarefas/{id}', 'TarefaController@update');
    $router->delete('/tarefas/{id}', 'TarefaController@apreensao');

    // Rotas para SubtarefasController
    $router->get('/subtarefas', 'SubtarefasController@busca');
    $router->post('/subtarefas', 'SubtarefasController@create');
    $router->put('/subtarefas/{id}', 'SubtarefasController@update');
    $router->delete('/subtarefas/{id}', 'SubtarefasController@apreensao');
});