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

//PROFESOR
Route::name('profesor.')->prefix('profesor')->middleware(['auth', 'tipo:2'])->group(function () {
    //Pagina principal
    Route::get('inicio', 'ProfesorController@index')->name('inicio');
    //Acceder al contenido de la clase
    Route::get('contenido/{slug}', 'ProfesorController@contenido_clase')->name('contenido');
    //RUTAS DEL CONTROLADOR DE CLASE
    //Crear una nueva clase
    Route::post('nueva_clase', 'ClaseController@store')->name('nueva_clase');
    //Crear una nueva unidad
    Route::post('nueva_unidad', 'ClaseController@nueva_unidad')->name('nueva_unidad');
    //RUTAS DEL CONTROLADOR DE DOCUMENTO
    //Subir un documento
    Route::post('subir_archivo', 'DocumentoController@store')->name('subir_archivo');
});

