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
//Danh sach cac Router chinh ve UI
Route::get('/', 'HomeController@index');
Route::get('/list', 'HomeController@search');
Route::get('/profile', 'HomeController@profile');
//Danh sach ve API o day
Route::controller('api', 'ApiController');
//Test va thu nghiem nen dc remove
Route::get('angular','TestController@angular');
Route::get('neo','TestController@neo');
Route::get('cypher','TestController@cypher');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
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