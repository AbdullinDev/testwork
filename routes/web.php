<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.testwork');
});

Route::group(['middleware'=>'web'], function(){
	Route::match(['get','post'], '/testpage', ['uses'=>'TestController@execute', 'as'=>'testpage']);
});

Route::get('/testpage', array('uses'=>'FilesController@getFiles', 'as'=>'testpage'));