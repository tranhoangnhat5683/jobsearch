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
Route::get('/api/user/search', 'Api\UserController@search');
//Route::get('/api/page/search', 'Api\PageController@search');
Route::get('/api/skill/search', 'Api\SkillController@search');
Route::get('/api/Character/search', 'Api\CharacterController@search');
//Danh sach ve API o day
//Route::controller('api', 'ApiController');
//Test va thu nghiem nen dc remove
Route::get('angular','TestController@angular');
Route::get('neo','TestController@neo');
Route::get('cypher','TestController@cypher');


//@Phu note: Bo may cai nay di, sao viet nhieu router vay?
//Route::get('api/user/search','Api\UserController@search');
//Route::get('api/skill/search','Api\SkillController@search');
//Route::get('api/character/search','Api\CharacterController@search');
//Route::get('api/page/search','Api\pageController@search');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
