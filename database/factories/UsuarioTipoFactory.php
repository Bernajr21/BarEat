<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Model;
use App\TipoUsuario;
use App\UsuarioTipo;
use Faker\Generator as Faker;

$factory->define(UsuarioTipo::class, function (Faker $faker) {
    return [
        'tipo_usuario_id' => TipoUsuario::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
