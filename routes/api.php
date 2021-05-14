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


//ESTABLECIMIENTOS
Route::apiResource('establecimientos', 'EstablecimientoController', ['only'=>['index']]);
Route::apiResource('establecimiento.imagenes', 'EstablecimientoImagenController', ['except'=>['update']]);
Route::apiResource('establecimiento.puntuaciones', 'EstablecimientoPuntuacionController', ['only'=>['index']]);
Route::apiResource('establecimiento.productos', 'EstablecimientoProductoController');
Route::apiResource('establecimiento.reservas', 'EstablecimientoReservaController', ['only'=>['index']]);
Route::apiResource('establecimiento.carta', 'EstablecimientoCartaController', ['only'=>['store']]);//duda! se crea automáticamente???
//Puedo omitirlo --> EstablecimientoProductoPuntuacionController????
//Route::apiResource('establecimientos.productos.puntuacion', 'EstablecimientoProductoPuntuacionController', ['only'=>['index']]);


//USUARIOS
//Controlador usuario.establecimiento???? UsuarioEstablecimientoController????
Route::apiResource('usuarios', 'UserController');
Route::apiResource('usuarios.tipos', 'UserTipoUsuarioController');
Route::apiResource('usuarios.reservas', 'UserReservaController', ['only'=>['index', 'store']]);
Route::apiResource('usuarios.reservas', 'UserReservaController', ['only'=>['index', 'store']]);
//Route::apiResource('usuario.establecimiento', 'UserEstablecimientoController', ['only'=>['store']]);
//Route::apiResource('usuarios.puntuación_establecimiento', 'UserPuntuacionEstablecimientoController', ['only'=>['store']]);
//Route::apiResource('usuarios.puntuación_producto', 'UserPuntuacionProductoController', ['only'=>['store']]);

Route::apiResource('reservas', 'ReservaController'); //Es necesario? Se visualizarían directamente con establecimientos.reservas

Route::apiResource('puntuaciones_establecimientos', 'PuntuacionEstablecimientoController');//Es necesario???

Route::apiResource('puntuaciones_productos', 'PuntuacionProductoController'); //Es necesario???

//controlador ProductosPuntuaciónController

//Solo de prueba. No necesario para la app
Route::apiResource('productos', 'ProductoController'); //Solo la puntuación teniendo en cuenta el establecimiento









