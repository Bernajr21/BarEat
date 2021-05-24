<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEstablecimiento;
use App\Http\Resources\EstablecimientoResource;


class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar establecimientos
        $establecimientos = Establecimiento::all();
        return $establecimientos;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($establecimiento_id)
    {
        $establecimiento = Establecimiento::find($establecimiento_id);
        //return $establecimiento;
        return new EstablecimientoResource($establecimiento);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstablecimiento $request, $establecimiento_id)
    {

        $establecimiento = Establecimiento::find($establecimiento_id);
        $request->validated([]);

        $establecimiento->update([
            'nombre_establecimiento' => $request['nombre_establecimiento'],
            'descripcion_establecimiento' => $request['descripcion_establecimiento'],
            'dirección_establecimiento' => $request['dirección_establecimiento'],
            'num_telefono' => $request['num_telefono'],
            'email' => $request['email'],
            'tipo_establecimiento' => $request['tipo_establecimiento'],
            'nif' => $request['nif'],
            'maximo_numero_comensales' => $request['maximo_numero_comensales'],
            'aforo' => $request['aforo'],
            'user_id' => $establecimiento->user_id,
        ]);

        return response()->json([
            'data' => $establecimiento,
            'message' => 'Actualización realización correctamente'], 200);
    }

}
