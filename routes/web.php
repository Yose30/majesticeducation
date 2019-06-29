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

Route::get('/construccion', function(){
    return view('construccion');
});

Route::get('/evaluaciones', function(){
    return view('evaluaciones');
})->middleware('auth', 'tipo'); //, sprintf("tipo:%s", 4)

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/buscar', 'HomeController@buscar')->name('home.buscar');

Route::get('/contenido/{id}', 'LibroController@contenido')->name('contenido');

Route::get('/interactivos', function(){
    return view('interactivos');
});


