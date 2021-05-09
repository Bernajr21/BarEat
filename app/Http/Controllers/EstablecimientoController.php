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
        /*$validatedData = $request->validate([
            '' => 'required|max:255',
            '' => 'required',
        ]);*/

        //Crear establecimiento
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
    public function destroy(Establecimiento $establecimiento)
    {
        //Eliminar establecimiento
        $establecimiento->delete();

        return response()->json([
            'data'=>$establecimiento,
            'message'=>'Establecimiento eliminado exitosamente'], 200);
    }
}
