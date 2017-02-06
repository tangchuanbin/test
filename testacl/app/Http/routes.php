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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',"Session\SessionController@create");
Route::post('/login',"Session\SessionController@store")->name('login');
Route::get('/index',"Session\SessionController@index")->name('index');
Route::get('/logout/{id}',"Session\SessionController@destroy")->name('logout');
Route::get('/test',"Session\SessionController@test");
Route::resource("users","User\UsersController");
Route::resource("roles","Role\RolesController");
Route::resource("permission","Permission\PermissionsController");
Route::get('/user/{id}/grant',"User\UsersController@grant")->name('users.grant');
Route::put('/user/{id}/grant',"User\UsersController@storeGrant")->name('users.update.grant');