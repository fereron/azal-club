<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**@var \Illuminate\Routing\Router $router */


$router->group(['middleware' => 'auth:api'], function (Router $router) {

    $router->post('menubar-toggle', 'Api\UserController@menubarToggle');
    $router->post('user/avatar', 'Api\UserController@changeAvatar');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
