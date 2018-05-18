<?php

use Illuminate\Routing\Router;
/**@var Router $router */


$router->get('/', 'PagesController@index')->name('home');
$router->get('flights', 'PagesController@flights')->name('flights');

Auth::routes();

$router->group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (Router $router) {

    $router->get('profile', 'ProfileController@index')->name('profile');
    $router->get('account-settings', 'ProfileController@settings')->name('settings');
    $router->post('account-settings', 'ProfileController@update')->name('profile.update');

});


//Route::get('/home', 'HomeController@index')->name('home');
