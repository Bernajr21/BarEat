<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstablecimientoProductoController extends Controller
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
    public function store(Request $request)
    {
<<<<<<< Updated upstream
        //
=======
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
    public function store(Request $request, Establecimiento $establecimiento)
    {

        //Habría que comprobar que un mismo establecimiento no pueda insertar dos productos iguales?

        $establecimiento_id = $establecimiento->id;
        $carta_id = $establecimiento->carta()->where('establecimiento_id', $establecimiento_id)->first();

        //Almacenar productos del establecimiento
        $producto = Producto::create([
            'nombre_producto' => $request['nombre_producto'],
            'descripcion_producto' => $request['descripcion_producto'],
            'precio_producto' => $request['precio_producto'],
            'tipo_producto' => $request['tipo_producto'],
            'carta_id' => $carta_id->id,
            //'ruta_foto_principal' => $request['ruta_foto_principal'],
        ]);

        return response()->json([
            'data'=>$producto,
            'message'=>'Registro realizado correctamente'], 200);
    
>>>>>>> Stashed changes
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
