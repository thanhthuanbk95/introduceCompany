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

Route::group(['prefix'=> 'admin','namespace'=>'BackEnd'],function (){

    Route::resource('users', 'UserController');
    Route::get('/index','HomeController@index')->name('admin.index')->middleware('CheckAdmin');
});

Route::get('/', function () {
    return view('welcome');
});