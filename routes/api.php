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


Route::apiResource('establecimientos', 'EstablecimientoController');
Route::apiResource('establecimientos.productos', 'EstablecimientoProductoController', ['only'=>['index', 'show']]);
//Route::apiResource('establecimientos.imagen', 'EstablecimientoImagenController', ['only'=>['index']]);

Route::apiResource('usuarios', 'UserController');

Route::apiResource('reservas', 'ReservaController');

Route::apiResource('imagen', 'ImagenController', ['only'=>['store','show', 'destroy']]);

Route::apiResource('reservas', 'ReservaController');
//Route::apiResource('users.libros', 'UserLibroController', ['only'=>['index',]]);
//Route::post('login', 'UserController@login');


