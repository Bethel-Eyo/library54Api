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
    //return $router->app->version();
    return 'Library54 is running ' . \Illuminate\Support\Str::random(32);
});

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    // to create admin account
    $router->post('register', 'AuthController@register');

    // for admin login
    $router->post('login', 'AuthController@login');

    $router->get('/test', 'AuthController@test');
 
 });

 $router->group(['prefix' => 'api/admins'], function () use ($router) {
     // create categpry
     $router->post('/create-category', 'CategoryController@create');

     // update category
     $router->post('/update-category', 'CategoryController@update');
 
     // delete category
     $router->get('/delete-category/{id}', 'CategoryController@delete');
 
     // create book and add to category
     $router->post('/create-book', 'BookController@create');
 
     // update book
     $router->post('/update-book', 'BookController@update');
 
     // delete book
     $router->get('/delete-book/{id}', 'BookController@delete');
 });
