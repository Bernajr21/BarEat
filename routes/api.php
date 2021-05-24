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
Route::apiResource('establecimientos', 'EstablecimientoController', ['only'=>['index', 'show', 'update']]);
Route::apiResource('establecimiento.imagenes', 'EstablecimientoImagenController', ['except'=>['update']]);
Route::apiResource('establecimiento.puntuaciones', 'EstablecimientoPuntuacionController', ['only'=>['index']]);
Route::apiResource('establecimiento.productos', 'EstablecimientoProductoController', ['except'=>['update']]);
Route::apiResource('establecimiento.reservas', 'EstablecimientoReservaController', ['only'=>['index']]);
Route::apiResource('establecimiento.carta', 'EstablecimientoCartaController', ['only'=>['store']]);

//CARTA
Route::apiResource('carta', 'CartaController', ['only'=>['show']]);

//USUARIOS
Route::apiResource('usuarios', 'UserController', ['except'=>['index']]);
Route::post('login', 'UserController@login');
Route::apiResource('usuarios.tipos', 'UserTipoController', ['only'=>['index']]);
Route::apiResource('usuario.establecimiento.reserva', 'UserEstablecimientoReservaController', ['only'=>['index','store', 'delete']]);
Route::apiResource('usuario.establecimiento', 'UserEstablecimientoController', ['only'=>['store']]);
Route::apiResource('usuario.establecimiento.puntuacion', 'UserPuntuacionEstablecimientoController', ['only'=>['store']]);
Route::apiResource('usuario.producto.puntuacion', 'UserPuntuacionProductoController', ['only'=>['store']]);

//PRODUCTOS
Route::apiResource('producto', 'ProductoController', ['only'=>['update']]);
Route::apiResource('producto.puntuaciones', 'ProductoPuntuacionController', ['only'=>['index']]);









