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
    return view('blank');
});

Route::get('client', function () {
    return view('client.client-add');
});

Route::get('/client-edit/{id}', 'ClientsController@getEdit');

Route::get('client-add', 'ClientsController@getAdd');
// Route::post('/store', 'ClientsController@postAdd')->name('store.post');

Route::get('/client-view/{id}', 'ClientsController@getView')->name('client-view.get');

Route::get('/client-list', 'ClientsController@getList')->name('client-list.get');

Route::get('client-search', function () {
    return view('client.client-search');
});

Route::get('create', 'ClientsController@create')->name('create.post');
Route::post('/store', 'ClientsController@store')->name('store.post');
Route::post('/update/{id}', 'ClientsController@update')->name('update.post');
