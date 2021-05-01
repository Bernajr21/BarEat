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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//Route::post('login', 'UserController@login');



Route::apiResource('establecimientos', 'EstablecimientoController');
Route::apiResource('establecimientos.imagen', 'EstablecimientoImagenController', ['only'=>['index', 'show', 'destroy']]);
Route::apiResource('establecimientos.puntuacion', 'EstablecimientoPuntuacionController', ['only'=>['index']]);
Route::apiResource('establecimientos.productos', 'EstablecimientoProductoController');
Route::apiResource('establecimientos.productos.puntuacion', 'EstablecimientoProductoPuntuacionController', ['only'=>['index']]);
Route::apiResource('establecimientos.reservas', 'EstablecimientoReservaController');
Route::apiResource('establecimientos.anuncios', 'EstablecimientoAnuncioController');


Route::apiResource('usuarios', 'UserController');
Route::apiResource('usuarios.tipos', 'UserTipoUsuarioController');
Route::apiResource('usuarios.reservas', 'UserReservasController', ['only'=>['index', 'store']]);

//Route::apiResource('productos', 'ProductoController');

Route::apiResource('reservas', 'ReservaController');

//Route::apiResource('imagen', 'ImagenController', ['except'=>['update']]);

Route::apiResource('puntuaciones_establecimientos', 'PuntuacionEstablecimientoController');

Route::apiResource('puntuaciones_productos', 'PuntuacionProductoController');

Route::apiResource('anuncios', 'AnuncioController');

Route::apiResource('pagos', 'PagoController');







