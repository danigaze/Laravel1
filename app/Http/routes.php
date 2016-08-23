<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('inicio', [
    'uses' => 'HomeController@inicio',
    'as'   => 'inicio'
]);

Route::get('dashboard', [
    'uses' => 'HomeController@getDashboard',
    'as'   => 'dashboard'
]);

//autenticación rutas
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

//registro routas
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');

//password reset link request rotes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

//Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::controller('productos', 'ProductosController');
Route::controller('clasificacions', 'ClasificacionsController');
Route::controller('marcas', 'MarcasController');

