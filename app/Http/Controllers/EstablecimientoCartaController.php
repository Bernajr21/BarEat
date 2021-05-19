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
        //1- Consultar a Rául --> ¿Creo la carta al tiempo que el establecimiento?
        
        //2- Cómo limitamos para que solo se pueda crear una carta por establecimiento
        /*if($id == $carta->establecimiento_id){
             return response()->json([
            'message'=>'ERROR. Ya existe una carta creada'], XXX?);
        }else{

        }*/

        //Insertamos la carta del establecimiento
        $carta = Carta::create([
            'establecimiento_id' => $id,
        ]);
        return response()->json([
            'data'=>$carta,
            'message'=>'Registro realizado correctamente'], 201);
    }

}
