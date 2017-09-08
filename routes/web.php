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
    Route::resource('parentcats', 'ParentCatController');
    Route::resource('categories', 'CatController');
    Route::resource('papers', 'PaperController');
    Route::get('/index','HomeController@index')->name('admin.index');
    Route::post('/setCategories','ParentCatController@setCategories')->name('setCategories');
    Route::post('/uploadimage/{idpaper}','PaperController@uploadImage')->name('uploadImage');
    Route::post('/deleteimage','PaperController@deleteImage')->name('deleteImage');
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace'=>'FrontEnd'],function (){
    Route::get('/','HomeController@index')->name('homepage');
    Route::get('/about','AboutController@index');
    Route::get('/project','ProjectController@index');
    Route::get('/project-single','ProjectSingleController@index');
    Route::get('/furniture','FurnitureController@index');
    Route::get('/phongthuy','PhongThuyController@index');
    Route::get('/contact','ContactController@index');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
