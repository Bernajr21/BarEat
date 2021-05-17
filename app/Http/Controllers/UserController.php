<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar usuarios
        $usuarios = User::all();
        return $usuarios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar usuario

        dd($request);
        
        //Crear usuario
        $usuario = User::create($request->all());

        $usuario->usuarios_tipo()->attach($usuario->id); //Esto se hace así????

        return response()->json([
            'data'=>$usuario,
            'message'=>'Registro realizado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $id)
    {

        //Comprobar si el usuarip existe, si no existe, mandar un mensaje de error

        $usuario = $user->find($id);
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         //validar información

        $user = new User;
        $usuario = $user->find($id);
        $usuario->update($request->all());

        return response()->json([
            'data' => $usuario,
            'message' => 'Actualización realización correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return response()->json([
            'data' => $user,
            'message' => 'Usuario eliminado correctamente'], 200);
    }
}
