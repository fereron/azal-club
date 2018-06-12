<?php

use Illuminate\Routing\Router;
/**@var Router $router */

//$router->get('flights', 'PagesController@flights')->name('flights');

Auth::routes();

$router->get('activate-account/{id}/{token}', 'Auth\RegisterController@confirmation')
    ->where('id', '[0-9]+')
    ->where('token', '[a-zA-z0-9=]+')
    ->name('register.confirmation');

$router->group(['middleware' => 'auth'], function (Router $router) {
    $router->get('/', function () {
        return redirect()->route('profile');
    });

    $router->get('profile', 'ProfileController@index')->name('profile');
    $router->get('account-settings', 'ProfileController@settings')->name('settings');
    $router->post('account-settings', 'ProfileController@update')->name('profile.update');

    $router->get('user/{uuid}', 'ProfileController@publicProfile')->name('profile.public');

    $router->get('groups/search', 'GroupController@searchView')->name('groups.search.view');
    $router->post('groups/search', 'GroupController@search')->name('groups.search');
    $router->post('group/user/add', 'GroupUserController@store')->name('group.user.add');
    $router->post('group/user/request/delete', 'GroupRequestController@delete')->name('group.user.request.delete');

    $router->post('group/post/add', 'PostController@store')->name('group.post.add');
    $router->post('group/post/comment/add', 'CommentsController@store')->name('group.post.comment.add');

    $router->get('group/{group}/requests', 'GroupController@requests')->name('group.requests');
    $router->post('group/requests/accept', 'GroupUserController@accept')->name('group.requests.accept');

    $router->get('groups', 'GroupController@index')->name('groups');
    $router->get('groups/edit/{group}', 'GroupController@edit')->name('group.edit');
    $router->post('groups/update/{group}', 'GroupController@update')->name('group.update');
    $router->get('groups/{group}', 'GroupController@show')->name('group.show');
    $router->post('group/create', 'GroupController@create')->name('group.create');
    $router->post('group/delete', 'GroupController@delete')->name('group.delete');
});


Route::get('/home', function () {
    return redirect()->route('profile');
});
