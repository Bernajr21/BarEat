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
        //Mostrar las puntuaciones de un producto determinado
        $puntuaciones = $producto->puntuaciones_producto()->where('carta_id', 2)->get();
        return $puntuaciones;
    }

}
