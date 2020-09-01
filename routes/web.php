<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/','HomeController@index');

Route::group(['middleware' => 'auth:admin','prefix'=>'admin'], function () {
    Route::get('/home','Admin\MyProfileController@index');
    Route::post('/music/create','Admin\MyProfileController@create');
    Route::get('/home/music_data','Admin\MyProfileController@music_data');
    Route::get('/home/edit','Admin\MyProfileController@edit');
    Route::post('/home/edit','Admin\MyProfileController@update');
    Route::get('/home/delete','Admin\MyProfileController@delete');
    Route::get('/user_list', 'Admin\MyProfileController@user_list');
    Route::get('/delete','Admin\MyProfileController@delete_user');

});
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/user/index','User\UserController@index');

});
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showloginform')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
 });