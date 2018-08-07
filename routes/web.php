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
    return view('owners.home');
})->middleware('auth');
Route::get('/', function () {
    return view('strangers.welcome');
})->middleware('guest');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ribbonslist', 'RibbonController@ribbonslist');
Route::get('/manage', 'RibbonController@manage');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/ribbon', 'RibbonController@rcreate');
Route::post('/ribbon', 'RibbonController@store');
Route::post('/ribbon/{ribbon}', 'RibbonController@edit');
Route::delete('/ribbon/{ribbon}', 'RibbonController@destroy');
Route::post('/ribbon/{ribbon}', 'RibbonController@load');
Route::post('/ribbon/{ribbon}/{photo}', 'RibbonController@getlike');
Route::delete('/ribbon/{ribbon}/{photo}', 'RibbonController@deletephoto');