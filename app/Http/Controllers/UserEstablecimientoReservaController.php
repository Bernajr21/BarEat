<?php

namespace App\Http\Controllers;

use App\User;
use App\Reserva;
use App\Establecimiento;
use Illuminate\Http\Request;

class UserEstablecimientoReservaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $establecimiento_id)
    {
        
        //Comprobar que no se crean dos reservas para el mismo día y a la misma hora

        
        //Almacenar imagen del establecimiento
        $reserva = Reserva::create([
            'user_id' => $user_id,
            'establecimiento_id' => $establecimiento_id,
            'num_comensales' => $request['num_comensales'],
            'fecha' => $request['fecha'],
            'hora' => $request['hora'],
        ]);

        return response()->json([
            'data'=>$reserva,
            'message'=>'Registro realizado correctamente'], 200);
    }

}
