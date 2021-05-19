<?php

namespace App\Http\Controllers;

use App\User;
use App\Helpers\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FormValidation;

class UserController extends Controller
{
    //AUTENTICACIÓN
    public function __construct()
	{
		$this->middleware('auth')->except('store','login');
	}

    public function login(Request $request)
    {
        $user = User::by_field('email', $request->email);

		if (isset($user) && Hash::check($request->password, $user->password))
        {
            $token = new Token(['email' => $user->email]);
            $token = $token->encode();

            return response()->json([
                "token" => $token
            ], 200);
        }

        return response()->json([
            "message" => "Acceso no autorizado"
        ], 401);
    }

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
    public function store(FormValidation $request)
    {
        //Validar usuario

        bcrypt($request['password']); //Funciona así?? Primero tendría que validarla

        //Token jwt
        $data_token = [
            "email" => $validatedData['email'],
        ];
        $token = new Token($data_token);
        $token = $token->encode();



        //Crear usuario
        $usuario = User::create($request->validated());

        //Insertamos ids en tabla pivote
        $usuario->usuarios_tipo()->attach($usuario->id); //Esto se hace así????

        return response()->json([
            'data'=>$usuario,
            'message'=>'Registro realizado correctamente'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {        
        $user = new User;
        return $user::find($user_id);
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
