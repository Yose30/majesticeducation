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
Route::post('/home/buscar', 'HomeController@buscar')->name('home.buscar');

Route::get('/contenido/{id}', 'LibroController@contenido')->name('contenido');


Route::get('/download/drive', 'LibroController@download')->name('download.drive');

