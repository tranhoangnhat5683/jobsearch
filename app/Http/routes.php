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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('angular','TestController@angular');
Route::get('neo','TestController@neo');
Route::get('cypher','TestController@cypher');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
Route::controller('api', 'ApiController');
Route::resource('jokes', 'JokesController');
Route::group(['prefix' => 'api/v1'], function(){
    Route::resource('jokes', 'API\V1\JokesController');
});
Route::group(['prefix' => 'api/v1'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});