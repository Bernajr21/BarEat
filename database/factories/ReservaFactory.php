<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Reserva;
use App\TipoUsuario;
use App\Establecimiento;
use Faker\Generator as Faker;

$factory->define(Reserva::class, function (Faker $faker) {

    $t = TipoUsuario::where('tipo', 'propietario')->pluck('id')->first();

    $u = User::whereHas('usuarios_tipo', function ($query) {$query->where('tipo_usuario_id', 1);})->get();

    return [
        'user_id' => $u,
        'establecimiento_id' => Establecimiento::all()->random()->id,
        'num_comensales' => $faker->numberBetween(1,10),
        'fecha' =>  date($format = 'Y-m-d', $max = 'now'),
        'hora' => time($format = 'H:i:s', $max = 'now'),
    ];
});
