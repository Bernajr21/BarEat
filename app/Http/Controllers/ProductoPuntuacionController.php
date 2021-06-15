<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

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

        $puntuaciones = $producto->puntuaciones_producto()->with('usuario')->get()->all();
        //dd($puntuaciones);
        return $puntuaciones;

    }

}
