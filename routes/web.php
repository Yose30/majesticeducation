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
    //Obtener los recursos del profesor
    Route::get('recursos_profesor', 'ProfesorController@recursos_profesor')->name('recursos_profesor');
    //Acceder al contenido de la clase
    Route::get('contenido/{slug}', 'ProfesorController@contenido_clase')->name('contenido');
    //Contenido de las evaluaciones
    Route::get('evaluaciones', 'ProfesorController@contenido_evaluaciones')->name('evaluaciones');
    //Ir a la vista de recurso
    Route::get('recursos', 'ProfesorController@contenido_recursos')->name('recursos');
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
    //Borrar archivo
    Route::delete('destroy_archivo', 'ArchivoController@destroy')->name('destroy_archivo');
    //Subir video
    Route::post('subir_video', 'ArchivoController@store_video')->name('subir_video');
    //Editar audio
    Route::post('editar_video', 'ArchivoController@update_video')->name('editar_video');
    //Subir un audio
    Route::post('subir_audio', 'ArchivoController@store_audio')->name('subir_audio');
    //Editar audio
    Route::post('editar_audio', 'ArchivoController@update_audio')->name('editar_audio');
    //Borrar archivo de la unidad
    Route::delete('borrar_archivo', 'ArchivoController@borrar_archivo')->name('borrar_archivo');
    //Seleccionar archivo
    Route::post('save_selected_archivos', 'ArchivoController@save_selected')->name('save_selected_archivos');
    //RUTAS DEL CONTROLADOR DE ENLACE
    //Borrar enlace
    Route::delete('destroy_enlace', 'EnlaceController@destroy')->name('destroy_enlace');
    //Subir enlace
    Route::post('store_enlace', 'EnlaceController@store')->name('store_enlace');
    //Editar enlace
    Route::post('editar_enlace', 'EnlaceController@update')->name('editar_enlace');
    //Borrar enlace de la unidad
    Route::delete('borrar_enlace', 'EnlaceController@borrar_enlace')->name('borrar_enlace');
    //RUTAS DEL CONTROLADOR DE PREGUNTAS
    //Agregar pregunta
    Route::post('nueva_pregunta', 'PreguntaController@store')->name('nueva_pregunta');
    //Editar pregunta
    Route::post('editar_pregunta', 'PreguntaController@update')->name('editar_pregunta');
    //RUTAS DEL CONTROLADOR EVALUACION
    //Obtener todas las evaluaciones creadas por un profesor
    Route::get('obtener_evaluaciones', 'EvaluacioneController@index')->name('obtener_evaluaciones');
    //Guardar evaluación
    Route::post('nueva_evaluacion', 'EvaluacioneController@store')->name('nueva_evaluacion');
    //Actualizar evaluacion
    Route::put('actualizar_evaluacion', 'EvaluacioneController@update')->name('actualizar_evaluacion');
    //Detalles de la evaluación
    Route::get('detalles_evaluacion', 'EvaluacioneController@show')->name('detalles_evaluacion');
    //Seleccionar archivo
    Route::post('save_selected_evaluaciones', 'EvaluacioneController@save_selected')->name('save_selected_evaluaciones');
});

//ALUMNO
Route::name('alumno.')->prefix('alumno')->middleware(['auth', 'tipo:3'])->group(function () {
    //Pagina principal
    Route::get('inicio', 'AlumnoController@index')->name('inicio');
    //Acceder al contenido de la clase
    Route::get('contenido/{slug}', 'AlumnoController@contenido_clase')->name('contenido');
    //RUTAS DEL CONTROLADOR DE CLASE
    //Ruta para unir a la clase
    Route::post('unir_clase', 'ClaseController@unir_clase')->name('unir_clase');
    //RUTAS DEL CONTROLADOR DE EVALUACION
    //Ruta para obtener los datos de la evaluación
    Route::get('contenido_evaluacion', 'EvaluacioneController@contenido_evaluacion')->name('contenido_evaluacion');
    //RUTAS DEL CONTROLADOR RESULTADO
    //Ruta para guardar los resultados de la evaluacion
    Route::post('guardar_resultados', 'ResultadoController@store')->name('guardar_resultados');
    //Obtener la calificación del alumno logeado
    Route::get('obtener_resultado', 'ResultadoController@obtener_resultado')->name('obtener_resultado');
});   

//Descargar archivo
Route::get('descargar_archivo/{id}', 'ArchivoController@download')->name('descargar_archivo');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
