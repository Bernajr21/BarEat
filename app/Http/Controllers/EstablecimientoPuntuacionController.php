<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;

class EstablecimientoPuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Establecimiento $establecimiento)
    {
       
        //Mostrar las puntuaciones de un establecimiento determinado
        /*$puntuaciones = $establecimiento->puntuaciones_establecimiento()->get();
        dd($puntuaciones->with('usuario')->get());
        return $puntuaciones;*/

        $puntuaciones = $establecimiento->usuarios_puntuacion()->with(['puntuacion_establecimientos'=>function($query) use($establecimiento){
            $query->where('puntuacion_establecimientos.establecimiento_id', $establecimiento->id );
        }])->where('establecimiento_id', $establecimiento->id)->get();
   
        return $puntuaciones;


        
        $puntuaciones = $establecimiento->puntuaciones_establecimiento()->with('usuario')->get()->all();
        //dd($puntuaciones);
        return $puntuaciones;
    }

}
