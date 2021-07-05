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

Route::get('/folders/{id}/music', 'MusicController@index')->name('music.index');
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::post('/folders/create', 'FolderController@create');
Route::get('/folders/{id}/music/create', 'MusicController@showCreateForm')->name('music.create');
Route::post('/folders/{id}/music/create', 'MusicController@create');