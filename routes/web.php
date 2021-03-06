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

Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){

    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/users', 'UsersController@index')->name('admin.users');
    Route::get('/users/add', 'UsersController@create')->name('users.add');
    Route::post('/users/store', 'UsersController@store')->name('users.store');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
    Route::put('/users/{id}', 'UsersController@update')->name('users.update');
    Route::delete('/users/{id}', 'UsersController@destroy')->name('users.delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
