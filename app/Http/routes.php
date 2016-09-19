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

/*
  Route::get('/', function () {
  return view('welcome');
  });
 */

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::get('auth/login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::get('auth/logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@logout'
]);

Route::get('auth/register', [
    'as' => 'register',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::post('auth/register', [
   'as' => 'register',
    'uses' => 'Auth\AuthController@postRegister'
]);

Route::resource('musiclibrary', 'MusiclibrariesController');
 
Route::resource('style', 'StylesController');

Route::resource('tempo', 'TemposController');

Route::resource('user', 'UsersController');

Route::get('user/{user}/delrole', [
    'as' => 'user.delrole',
    'uses' => 'UsersController@deleteRole'
]);

Route::post('user/{user}/addrole', [
    'as' => 'user.addrole',
    'uses' => 'UsersController@addRole'
]);

Route::get('nya', [
    'as' => 'nya',
    'uses' => 'PagesController@notYetAvailable'
]);

// Look in router.php to see how Route::auth(); gets expanded.
Route::auth();

Route::group(['middleware' => ['web']], function ()
{
    
});
