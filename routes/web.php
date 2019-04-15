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
// content
Route::get('contents', 'ContentsController@index')->name('contents.index');
Route::get('insert','ContentsController@insertform');
Route::post('create','ContentsController@insert');
Route::get('contents/edit/{id}', 'ContentsController@editForm');
Route::post('{id}/update', 'ContentsController@update');
Route::delete('contents/delete/{id}', 'ContentsController@destroy')->name('content.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resources([
    'contents' => 'ContentsController',
    'admins' => 'AdminController'
]);

// index halaman admin
Route::get('list-of-admin', 'AdminController@index')->name('admin.index');
// halaman insert admin
Route::get('admin/insert', 'AdminController@insertForm');
Route::post('admin/create', 'AdminController@create');
// halaman detail admin
Route::get('admin/{id}', 'AdminController@show');
// halaman update admin
Route::get('admin/{id}/edit', 'AdminController@updateForm');
Route::post('admin/{id}/update', 'AdminController@update');
// delete admin
Route::post('admin/{id}/delete', 'AdminController@delete');