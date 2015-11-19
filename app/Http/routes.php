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
Route::get('api/user/search','Api\UserController@search');
Route::get('api/skill/search','Api\SkillController@search');
Route::get('api/character/search','Api\CharacterController@search');
Route::get('api/page/search','Api\pageController@search');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);