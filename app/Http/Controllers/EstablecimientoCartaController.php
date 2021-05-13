<?php

namespace App\Http\Controllers;

use App\Carta;
use Illuminate\Http\Request;

class EstablecimientoCartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
            'message'=>'Registro realizado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
