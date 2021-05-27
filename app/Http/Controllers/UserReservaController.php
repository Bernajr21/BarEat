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
        $reserva = User::find($user_id)->reserva()->get();
        return $reserva;
    }
}
