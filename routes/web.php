<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return 'Primeira API REST com... ' . $router->app->version();
});

$router->group(['prefix'=>'courses'], function () use ($router) {
    $router->get('/', 'CourseController@index');
    $router->get('/{course}', 'CourseController@show');

    $router->post('/', 'CourseController@store');
    $router->put('/{course}', 'CourseController@update');
    $router->delete('/{course}', 'CourseController@destroy');
});
