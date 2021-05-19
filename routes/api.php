<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//ESTABLECIMIENTOS
Route::apiResource('establecimientos', 'EstablecimientoController', ['only'=>['index', 'show']]);
Route::apiResource('establecimiento.imagenes', 'EstablecimientoImagenController', ['except'=>['update']]);
Route::apiResource('establecimiento.puntuaciones', 'EstablecimientoPuntuacionController', ['only'=>['index']]);
Route::apiResource('establecimiento.productos', 'EstablecimientoProductoController');
Route::apiResource('establecimiento.reservas', 'EstablecimientoReservaController', ['only'=>['index']]);
Route::apiResource('establecimiento.carta', 'EstablecimientoCartaController', ['only'=>['store']]);


//USUARIOS
Route::apiResource('usuarios', 'UserController', ['except'=>['index']]);
Route::post('login', 'UserController@login');
Route::apiResource('usuarios.tipos', 'UserTipoController', ['except'=>['index']]);
Route::apiResource('usuario.establecimiento.reserva', 'UserEstablecimientoReservaController', ['only'=>['store', 'show', 'delete']]);
Route::apiResource('usuario.establecimiento', 'UserEstablecimientoController', ['only'=>['store']]);
Route::apiResource('usuario.establecimiento.puntuacion', 'UserPuntuacionEstablecimientoController', ['only'=>['store']]);
Route::apiResource('usuario.producto.puntuacion', 'UserPuntuacionProductoController', ['only'=>['store']]);

//controlador ProductosPuntuaciónController
Route::apiResource('producto.puntuaciones', 'ProductoPuntuacionController', ['only'=>['index']]);


//Solo de prueba. No necesario para la app
//Route::apiResource('productos', 'ProductoController'); //Solo la puntuación teniendo en cuenta el establecimiento









