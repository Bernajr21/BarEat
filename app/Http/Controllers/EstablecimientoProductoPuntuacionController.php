<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Establecimiento;
use Illuminate\Http\Request;

class EstablecimientoProductoPuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($establecimiento_id, $producto_id)
    {
         
        //Devolver la puntuación de un producto en concreto que 
        //pertenece a un establecimiento determinado
        $establecimiento = Establecimiento::find($establecimiento_id);

        $establecimiento = Establecimiento::find($establecimiento_id);
        $carta = $establecimiento->carta()
                                ->where('establecimiento_id', $establecimiento_id)
                                ->first()->establecimiento_id;


        $producto = $establecimiento->productos_carta()->where('carta_id', $carta)->get();

        $producto = Producto::find($producto_id);
        $producto_puntuaciones = $producto->puntuaciones_producto()->get();
        
        return [
            "Producto" => $producto,
            "Puntuación" => $producto_puntuaciones
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
