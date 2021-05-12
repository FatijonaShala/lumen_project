<?php


//$router->get('/', function () use ($router) {
 //   return $router->app->version();
 //   });

Route::post('auth/userlogin', 'ApiController@userLogin');
Route::post('auth/adminlogin', 'ApiController@adminLogin');


$router->group([ 'prefix' => 'api/v1/user'], function($router){

$router->get('user/{id}', 'UserController@show');
    $router->get('user/{name}', 'UserController@show');
    $router->get('user/{email}', 'UserController@show');
    $router->get('user/{phone}', 'UserController@show');
    $router->get('user/{adress}', 'UserController@show');

	$router ->post('posts/add','UserController@createPost');
	$router ->put('posts/view/{id}','UserController@updatePost');
	$router ->delete('posts/delete/{id}','UserController@deletePost');
	$router ->get('posts/index','UserController@index');

 
});
 
 $router->group(['prefix' => 'api/v1/admin'], function($router){

    $router->get('admin/{id}', 'AdminController@show');
    $router->get('admin/{name}', 'AdminController@show');
    $router->get('admin/{email}', 'AdminController@show'); 

	$router ->delete('posts/delete/{id}','AdminController@deletePost');
	$router ->get('posts/index','AdminController@index');


});
