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

// 示例：http://daocloud-plus.blankapp.org/b131a88748f84b3f956839d3e9879baf
Route::post('/{alias}', 'NotifierController@webhook');
