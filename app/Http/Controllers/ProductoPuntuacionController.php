<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductoPuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $producto)
    {
        /*$puntuaciones = $producto->puntuaciones_producto()->get();
        return $puntuaciones;*/
        
        $puntuaciones = $producto->usuarios_puntuacion()->with(['puntuacion_productos'=>function($query) use($producto){
                $query->where('puntuacion_productos.producto_id', $producto->id );
        }])->where('producto_id', $producto->id)->get();
       
        return $puntuaciones;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show(Producto $producto)
    {
        $puntuaciones = $producto->puntuaciones_producto()->with('usuario')->get()->all();
        //dd($puntuaciones);
        return $puntuaciones;
    }*/

}
