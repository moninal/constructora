<?php

use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

///usuario
Route::get('form_nuevo_usuario', 'App\Http\Controllers\Auth\RegisteredUserController@form_nuevo_usuario');
Route::get('form_editar_usuario/{id}', 'App\Http\Controllers\Auth\RegisteredUserController@form_editar_usuario');
Route::post('editar_usuario', 'App\Http\Controllers\Auth\RegisteredUserController@editar_usuario');
Route::get('borrar_usuario/{id}', 'App\Http\Controllers\Auth\RegisteredUserController@borrar_usuario');
//equipo
Route::get('equipoalquiler', 'App\Http\Controllers\AlquilerController@equipoalquiler'); 
Route::get('form_nuevo_equipo', 'App\Http\Controllers\AlquilerController@form_nuevo_equipo');
Route::post('guardarequipoalquiler', 'App\Http\Controllers\AlquilerController@guardarequipoalquiler'); 
Route::get('formeditarequipo/{id}', 'App\Http\Controllers\AlquilerController@formeditarequipo');
Route::post('editarequipoalquiler', 'App\Http\Controllers\AlquilerController@editarequipoalquiler');
Route::get('borrarequipo/{id}', 'App\Http\Controllers\AlquilerController@borrarequipo');
//alquiler
Route::get('alquiler', 'App\Http\Controllers\AlquilerController@alquiler'); 
Route::get('formnuevoalquiler', 'App\Http\Controllers\AlquilerController@formnuevoalquiler');
Route::post('guardaralquiler', 'App\Http\Controllers\AlquilerController@guardaralquiler');
Route::post('equipover', 'App\Http\Controllers\AlquilerController@equipover'); 
Route::get('formeditaralquiler/{id}', 'App\Http\Controllers\AlquilerController@formeditaralquiler');
Route::post('editaralquiler', 'App\Http\Controllers\AlquilerController@editaralquiler');
Route::get('borraralquiler/{id}', 'App\Http\Controllers\AlquilerController@borraralquiler');
//reportes aqluiler
Route::get('reportealquilerrealizados', 'App\Http\Controllers\AlquilerController@reportealquilerrealizados'); 
Route::get('buscaralquiler/{id1}/{id2}/{id3}', 'App\Http\Controllers\AlquilerController@ver_alquiler');
Route::get('pdfalquiler', 'App\Http\Controllers\AlquilerController@pdfalquiler'); 
Route::get('pdfalquilerver', 'App\Http\Controllers\AlquilerController@pdfalquilerver');
Route::get('pdfalquilerver/{id1}/{id2}/{id3}', 'App\Http\Controllers\AlquilerController@pdfalquilerver'); 
Route::get('excelalquiler', 'App\Http\Controllers\AlquilerController@excelalquiler');
Route::get('excelalquilerver/{id1}/{id2}/{id3}', 'App\Http\Controllers\AlquilerController@excelalquilerver'); 
//adelanto
Route::get('adelanto', 'App\Http\Controllers\AdelantoController@index');  
Route::get('formeditaradelanto/{id}', 'App\Http\Controllers\AdelantoController@formeditaradelanto');
Route::post('editaradelanto', 'App\Http\Controllers\AdelantoController@editaradelanto'); 
//ciudad
Route::get('ciudad', 'App\Http\Controllers\ProyectoController@index'); 
Route::get('formnuevociudad', 'App\Http\Controllers\ProyectoController@formnuevociudad');
Route::post('guardarciudad', 'App\Http\Controllers\ProyectoController@guardarciudad'); 
Route::get('formeditarciudad/{id}', 'App\Http\Controllers\ProyectoController@formeditarciudad');
Route::post('editarciudad', 'App\Http\Controllers\ProyectoController@editarciudad');
Route::get('borrarciudad/{id}', 'App\Http\Controllers\ProyectoController@borrarciudad');
//actividad
Route::get('actividad', 'App\Http\Controllers\ProyectoController@actividad'); 
Route::get('formnuevoactividad', 'App\Http\Controllers\ProyectoController@formnuevoactividad');
Route::post('guardaractividad', 'App\Http\Controllers\ProyectoController@guardaractividad'); 
Route::get('formeditaractividad/{id}', 'App\Http\Controllers\ProyectoController@formeditaractividad');
Route::post('editaractividad', 'App\Http\Controllers\ProyectoController@editaractividad');
Route::get('borraractividad/{id}', 'App\Http\Controllers\ProyectoController@borraractividad');
//proyecto
Route::get('ingresoproyecto', 'App\Http\Controllers\ProyectoController@ingresoproyecto'); 
Route::get('formnuevoproyecto', 'App\Http\Controllers\ProyectoController@formnuevoproyecto');
Route::post('guardarproyecto', 'App\Http\Controllers\ProyectoController@guardarproyecto'); 
Route::get('formeditarproyecto/{id}', 'App\Http\Controllers\ProyectoController@formeditarproyecto');
Route::post('editarproyecto', 'App\Http\Controllers\ProyectoController@editarproyecto');
Route::get('borrarproyecto/{id}', 'App\Http\Controllers\ProyectoController@borrarproyecto');
//ventas
Route::get('venta', 'App\Http\Controllers\VentaController@venta'); 
Route::post('direccionproveedorventa', 'App\Http\Controllers\VentaController@direccionproveedorventa');
Route::post('correlativoventa', 'App\Http\Controllers\VentaController@correlativoventa');
Route::post('precioventa', 'App\Http\Controllers\VentaController@precioventa');
Route::post('guardarventa', 'App\Http\Controllers\VentaController@guardarventa');
//anular venta
Route::get('anularventa', 'App\Http\Controllers\VentaController@anularventa');  
Route::get('borrar_venta/{id}', 'App\Http\Controllers\VentaController@borrar_venta'); 
Route::get('ver_venta/{id}', 'App\Http\Controllers\VentaController@ver_venta');

//reportes
Route::get('reporteventas', 'App\Http\Controllers\ReporteController@reporteventas'); 
Route::get('buscarventasfechas/{id1}/{id2}', 'App\Http\Controllers\ReporteController@ver_ventafecha');
Route::get('reporteinventario', 'App\Http\Controllers\ReporteController@reporteinventario'); 
Route::get('buscarstockproducto/{id1}', 'App\Http\Controllers\ReporteController@ver_stockproducto');
 
