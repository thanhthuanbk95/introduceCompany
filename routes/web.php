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
    Route::resource('phongthuy', 'PhongThuyController');
    Route::resource('indexImage', 'IndexImageController');
    Route::resource('adcontact', 'ContactController');
    Route::get('infor', 'InformationController@index')->name('infor');
    Route::post('inforUpdate', 'InformationController@update')->name('inforUpdate');
    Route::get('introInfo', 'IntroduceController@index')->name('introInfo');
    Route::post('introUpdate', 'IntroduceController@update')->name('introUpdate');
    Route::get('/index','HomeController@index')->name('admin.index');
    Route::post('/setCategories','ParentCatController@setCategories')->name('setCategories');
    Route::post('/uploadimage/{idpaper}','PaperController@uploadImage')->name('uploadImage');
    Route::post('/deleteimage','PaperController@deleteImage')->name('deleteImage');
    Route::post('/delphongthuyimage','PhongThuyController@deleteImage')->name('delImage');
    Route::post('/replyContact','ContactController@replyContact')->name('replyContact');
    Route::get('/taikhoan','UserController@getEdit')->name('getEdit');
    Route::put('/taikhoan','UserController@putEdit')->name('putEdit');
    Route::get('/baiviet/{idParent}','PaperController@indexByCat')->name('paperByCat');
    Route::get('/them-bai-viet/{idParent}','PaperController@create')->name('createPaper');
    Route::post('/them-bai-viet/{idParent}','PaperController@store')->name('storePaper');
    Route::get('/bai-viet/{idPaper}','PaperController@showPaper')->name('showPaper');

});


Route::group(['namespace'=>'FrontEnd'],function (){
    Route::get('/','HomeController@index')->name('homepage');
    Route::get('/gioithieu','AboutController@index')->name('gioithieu');
    Route::get('/project','ProjectController@index');
    Route::get('/project-single','ProjectSingleController@index');
    //Route::get('/furniture','FurnitureController@index');
    Route::get('phongthuy','PhongThuyController@index')->name('phongthuy');
    Route::get('phongthuysingle/{id}.html', 'PhongThuyController@showSinglePage')->name('phongthuysingle');
    Route::resource('/contact', 'ContactController');
    Route::get('/danhmuc/{id}', 'ParentCatController@index')->name('danhmuc');
    Route::get('/danhmuc/tieumuc/{id}', 'CategoryController@index')->name('tieumuc');
    Route::get('/baiviet/{id}', 'PaperController@index')->name('baiviet');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


