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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cv', 'UserDetailController@uploadCV')->name('cv.upload');
Route::put('/cv/{id}', 'UserDetailController@storeCV')->name('cv.store');

Route::get('/manage_detail/add/{id}', 'ManageUserDetailController@add')->name('manage_detail.add');
Route::post('cv/changeStatus', array('as' => 'changeStatus', 'uses' => 'ManageCvController@changeStatus'));

Route::resource('detail', 'UserDetailController');
Route::resource('profile', 'UserController');
Route::resource('manage_cv', 'ManageCvController');
Route::resource('manage_user', 'ManageUserController');
Route::resource('manage_detail', 'ManageUserDetailController');
