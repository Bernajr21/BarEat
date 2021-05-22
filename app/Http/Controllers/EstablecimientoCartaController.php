<?php

namespace App\Http\Controllers;

use App\Carta;
use Illuminate\Http\Request;

class EstablecimientoCartaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //Insertamos la carta del establecimiento
        $carta = Carta::create([
            'establecimiento_id' => $id,
        ]);
        return response()->json([
            'data'=>$carta,
            'message'=>'Registro realizado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($establecimiento_id, $carta_id)
    {
        $carta = Carta::where('establecimiento_id', $establecimiento_id)->get();
        //Mostrar una carta concreta de un establecimiento determinado (teniendo en cuenta sus ids)
        $c = $carta->find($carta_id)->productos()->get();
        return $c;
    }

}
