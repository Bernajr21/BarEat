<?php

namespace App\Http\Controllers;

use App\PuntuacionProducto;
use Illuminate\Http\Request;

class UserPuntuacionProductoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $producto_id)
    {
        //Almacenar puntuación del establecimiento
        $puntuacionProducto = PuntuacionProducto::create([
            'user_id' => $user_id,
            'producto_id' => $producto_id,
            'puntuacion_producto' => $request['puntuacion_producto'],
            'comentario' => $request['comentario'],
        ]);

        return response()->json([
            'data'=>$puntuacionProducto,
            'message'=>'Registro realizado correctamente'], 201);
    }
}
