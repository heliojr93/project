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
    Route::post('/user/index','User\UserController@profile');
    Route::get('/user/music_listen','User\UserController@music_listen');
    Route::get('/user/genre_jpop','User\GenreController@jpop');
    Route::get('/user/genre_pop','User\GenreController@pop');
    Route::get('/user/genre_rock','User\GenreController@rock');
    Route::get('/user/genre_rap','User\GenreController@rap');
    Route::get('/user/genre_riprop','User\GenreController@riprop');
    Route::get('/user/genre_classic','User\GenreController@classic');
    Route::get('/user/genre_jazz','User\GenreController@jazz');
    //Route::post('favorite', 'User\FavoritesController@store')->name('user.favorite');
    Route::post('favorite/{id}', 'User\FavoritesController@store')->name('favorite');
    //Route::delete('unfavorite', 'User\FavoritesController@destroy')->name('user.unfavorite');
    Route::delete('unfavorite/{id}', 'User\FavoritesController@destroy')->name('unfavorite');
    Route::get('/user/favorites','User\FavoritesController@index');

});
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showloginform')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
 });