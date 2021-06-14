<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $reservas = User::find($user_id)->reserva()->get();
       
        $r = $reservas->all();
        //dd($r);
        //dd($r);

        $collection = $reservas->map(function ($v) {
            $e = $v->establecimiento()->get();
            return $e;
        });

        return [
            'establecimientos' => $collection,
            'reservas' => $reservas,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $reserva_id)
    {
        //Comprobar si existe la reserva que buscamos

        //Eliminar reserva
        $reserva = User::find($user_id)->reserva()->find($reserva_id)->delete();

        return response()->json([
            'data'=>$reserva,
            'message'=>'Reserva eliminada exitosamente'], 200);
    }
}
