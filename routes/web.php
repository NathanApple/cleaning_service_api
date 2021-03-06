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

$router->group(['prefix'=>'supervisor'], function() use ($router){
    $router->group(['middleware' => 'supervisor'], function() use ($router){
        
        $router->group(['prefix'=>'task'], function() use ($router){
            
            $router->post('create', 'TaskController@create');
            $router->get('view', 'TaskController@view');
            


        });
    
        $router->group(['prefix'=>'zoning'], function() use ($router){
            $router->post('create', 'ZoningController@create');
            $router->get('view', 'ZoningController@view');

            $router->group(['prefix'=>'instant'], function() use ($router){
                $router->post('create', 'ZoningController@instantCreate');
            });
        });

        $router->group(['prefix'=>'detail'], function() use ($router){
            $router->post('create', 'ZoningDetailController@create');

            $router->group(['prefix'=>'instant'], function() use ($router){
                $router->post('create', 'ZoningDetailController@instantCreate');
            });
        });


        $router->group(['prefix'=>'assign'], function() use ($router){
            $router->post('create', 'UserTaskController@create');
        });


    });

});

$router->group(['prefix'=>'worker'], function() use ($router){
    $router->group(['middleware' => 'auth'], function() use ($router){

        $router->group(['prefix'=>'task'], function() use ($router){
            $router->get('view', 'UserTaskController@viewTodayTask');
        });

        $router->group(['prefix'=>'zoning'], function() use ($router){
            $router->get('view', 'ZoningReportController@view');
        });

    });
});