<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
        /*$validacion = $request->validate([ //La validación me está jodiendo el resto
            'nombre_establecimiento' => 'required',
            'descripcion_establecimiento' => 'required',
            'direccion_establecimiento' => 'required',
            'num_telefono' => 'required|unique:establecimientos|integer',
            'email' => 'required|max:255|unique:establecimientos',
            //'latitud' => '',
            //'longitud' => '',
            'tipo_establecimiento' => 'required',
            'nif' => 'required',
        ]);*/

        //Almacenar establecimiento
        $establecimiento = Establecimiento::create($request->all());
        return response()->json([
            'data'=>$establecimiento,
            'message'=>'Registro realizado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        //Comprobar si existe el establecimiento que estamos buscando
        
        //Mostrar establecimiento por id
        return $establecimiento;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {

        //Actualizar establecimiento
        $establecimiento->update($request->all());

        return response()->json([
            'data'=>$establecimiento,
            'message'=>'Actualización realizada correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar establecimiento
        $establecimiento = Establecimiento::find($id)->delete();

        //Problemas con constraint

        return response()->json([
            'data'=>$establecimiento,
            'message'=>'Establecimiento eliminado exitosamente'], 200);
    }
}
