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
    Route::get('/index','HomeController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'FrontEnd'],function (){
    Route::get('/home','HomeController@index');
    Route::get('/about','AboutController@index');
    Route::get('/project','ProjectController@index');
    Route::get('/furniture','FurnitureController@index');
    Route::get('/phongthuy','PhongThuyController@index');
    Route::get('/contact','ContactController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
