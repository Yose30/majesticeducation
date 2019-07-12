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
    //RUTAS DEL CONTROLADOR DE ARCHIVO
    //Subir un documento
    Route::post('subir_archivo', 'ArchivoController@store_documento')->name('subir_archivo');
    //Subir un audio
    Route::post('subir_audio', 'ArchivoController@store_audio')->name('subir_audio');
    //Borrar archivo
    Route::delete('borrar_archivo', 'ArchivoController@destroy')->name('borrar_archivo');
    //RUTAS DEL CONTROLADOR DE ENLACE
    //Subir enlace
    Route::post('store_enlace', 'EnlaceController@store')->name('store_enlace');
});

//Descargar archivo
Route::get('descargar_archivo/{seccion_id}/{id}', 'ArchivoController@download')->name('descargar_archivo');

