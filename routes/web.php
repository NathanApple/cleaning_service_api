<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Auth
$router->post('login', 'LoginController@login');
$router->post('register', 'LoginController@register');


$router->group(['prefix'=>'task'], function() use ($router){
    $router->group(['middleware' => 'auth'], function() use ($router){
        $router->post('create', 'TaskController@create');
    });
});