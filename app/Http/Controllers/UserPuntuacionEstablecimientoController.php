<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntuacionEstablecimiento;

class UserPuntuacionEstablecimientoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $establecimiento_id)
    {
        //Almacenar puntuación del establecimiento
        $puntuacionEstablecimiento = PuntuacionEstablecimiento::create([
            'user_id' => $user_id,
            'establecimiento_id' => $establecimiento_id,
            'puntuacion_establecimiento' => $request['puntuación_establecimiento'],
            'comentario' => $request['comentario'],
        ]);

        return response()->json([
            'data'=>$puntuacionEstablecimiento,
            'message'=>'Registro realizado correctamente'], 200);
    }

}
