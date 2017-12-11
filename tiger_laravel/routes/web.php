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

Route::any('reg/index', 'RegController@index');
Route::any('reg/add', 'RegController@add');
Route::any('reg/show', 'RegController@show');
Route::any('reg/deletes', 'RegController@deletes');
Route::any('reg/updates', 'RegController@updates');
Route::any('reg/upd', 'RegController@upd');


Route::any('tiger_index', 'TigerController@index');
Route::any('tiger_login', 'TigerController@login');
Route::any('tiger_start', 'TigerController@start');

