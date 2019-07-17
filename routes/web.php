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
    //Actualizar unidad
    Route::post('editar_unidad', 'ClaseController@editar_unidad')->name('editar_unidad');
    //Eliminar unidad
    Route::delete('eliminar_unidad', 'ClaseController@eliminar_unidad')->name('eliminar_unidad');
    //RUTAS DEL CONTROLADOR DE ARCHIVO
    //Subir un documento
    Route::post('subir_archivo', 'ArchivoController@store_documento')->name('subir_archivo');
    //Editar documento
    Route::post('editar_archivo', 'ArchivoController@update_documento')->name('editar_archivo');
    //Subir video
    Route::post('subir_video', 'ArchivoController@store_video')->name('subir_video');
    //Editar audio
    Route::post('editar_video', 'ArchivoController@update_video')->name('editar_video');
    //Subir un audio
    Route::post('subir_audio', 'ArchivoController@store_audio')->name('subir_audio');
    //Editar audio
    Route::post('editar_audio', 'ArchivoController@update_audio')->name('editar_audio');
    //Borrar archivo
    Route::delete('borrar_archivo', 'ArchivoController@destroy')->name('borrar_archivo');
    //RUTAS DEL CONTROLADOR DE ENLACE
    //Subir enlace
    Route::post('store_enlace', 'EnlaceController@store')->name('store_enlace');
    //Editar enlace
    Route::post('editar_enlace', 'EnlaceController@update')->name('editar_enlace');
    //Borrar enlace
    Route::delete('borrar_enlace', 'EnlaceController@destroy')->name('borrar_enlace');
});

//ALUMNO
Route::name('alumno.')->prefix('alumno')->middleware(['auth', 'tipo:3'])->group(function () {
    //Pagina principal
    Route::get('inicio', 'AlumnoController@index')->name('inicio');
    //Acceder al contenido de la clase
    Route::get('contenido/{slug}', 'AlumnoController@contenido_clase')->name('contenido');
    //RUTAS DEL CONTROLADOR DE CLASE
    Route::post('unir_clase', 'ClaseController@unir_clase')->name('unir_clase');
});   

//Descargar archivo
Route::get('descargar_archivo/{seccion_id}/{id}', 'ArchivoController@download')->name('descargar_archivo');

