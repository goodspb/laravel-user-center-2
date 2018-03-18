<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->group(['prefix' => '/oauth', 'namespace' => 'Oauth'], function (Router $router) {
        $router->resource('/client', 'ClientController');
        $router->resource('/code', 'CodeController');
    });

});
