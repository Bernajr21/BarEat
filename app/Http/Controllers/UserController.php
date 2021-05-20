<?php

namespace App\Http\Controllers;

use App\User;
use App\TipoUsuario;
use App\Helpers\Token;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

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
    public function store(StoreUser $request)
    {
        //Validar usuario
        

        /*bcrypt($request['password']); //Funciona así?? Primero tendría que validarla

        //Token jwt
        $data_token = [
            "email" => $request['email'],
        ];
        $token = new Token($data_token);
        $token = $token->encode();*/

        //dd($request->validated());

        //Crear usuario
        $usuario = User::create($request->validated());

        //Insertamos ids en tabla pivote

        $t = TipoUsuario::where('tipo', 'propietario')->pluck('id')->first();
        //$u = User::whereHas('usuarios_tipo', function ($query) {$query->where('tipo_usuario_id', 2);})->get();
        $usuario->usuarios_tipo()->attach($t); 

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
        //return $user::find($user_id);
        $u = $user::find($user_id);

        //return new $u->resource($u);

        return new UserResource($u);

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
