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

Route::resource('role', 'RolesController');

Route::resource('group', 'GroupsController');

Route::resource('instrument', 'InstrumentsController');

Route::resource('skill', 'SkillsController');

Route::resource('resource', 'ResourcesController');
 
Route::get('user/{pgSz}/setPgSz', [
    'as' => 'user.setPgSz',
    'uses' => 'UsersController@index'
]);

Route::get('instrument/{pgSz}/setPgSz', [
    'as' => 'instrument.setPgSz',
    'uses' => 'InstrumentsController@index'
]);

Route::get('tempo/{pgSz}/setPgSz', [
    'as' => 'tempo.setPgSz',
    'uses' => 'TemposController@index'
]);

Route::get('style/{pgSz}/setPgSz', [
    'as' => 'style.setPgSz',
    'uses' => 'StylesController@index'
]);

Route::get('skill/{pgSz}/setPgSz', [
    'as' => 'skill.setPgSz',
    'uses' => 'SkillsController@index'
]);

Route::get('role/{pgSz}/setPgSz', [
    'as' => 'role.setPgSz',
    'uses' => 'RolesController@index'
]);

Route::get('musiclibrary/{pgSz}/setPgSz', [
    'as' => 'musiclibrary.setPgSz',
    'uses' => 'MusiclibrariesController@index'
]);

Route::get('group/{pgSz}/setPgSz', [
    'as' => 'group.setPgSz',
    'uses' => 'GroupsController@index'
]);

Route::get('user/{user}/delrole', [
    'as' => 'user.delrole',
    'uses' => 'UsersController@deleteRole'
]);

Route::post('user/{user}/addrole', [
    'as' => 'user.addrole',
    'uses' => 'UsersController@addRole'
]);

Route::get('user/{user}/indexinstr', [
    'as' => 'user.indexinstr',
    'uses' => 'UsersController@indexInstruments'
]);

Route::get('user/{user}/addinstrrequest', [
    'as' => 'user.addinstrrequest',
    'uses' => 'UsersController@addInstrumentsRequest'
]);

Route::post('user/{user}/addinstr', [
    'as' => 'user.addinstr',
    'uses' => 'UsersController@addInstrument'
]);

Route::get('user/{user}/editproficiency', [
    'as' => 'user.editproficiency',
    'uses' => 'UsersController@editProficiency'
]);

Route::post('user/{user}/updateproficiency', [
    'as' => 'user.updateproficiency',
    'uses' => 'UsersController@updateProficiency'
]);

Route::get('user/{user}/delinstr', [
    'as' => 'user.delinstr',
    'uses' => 'UsersController@deleteInstrument'
]);

Route::get('nya', [
    'as' => 'nya',
    'uses' => 'PagesController@notYetAvailable'
]);

Route::get('settings', [
    'as' => 'settings.show',
    'uses' => 'SettingsController@show'
    ]);

Route::post('settings', [
    'as' => 'settings.update',
    'uses' => 'SettingsController@update'
    ]);

// Look in router.php to see how Route::auth(); gets expanded.
Route::auth();

Route::group(['middleware' => ['web']], function ()
{
    
});
