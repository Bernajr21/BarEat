<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Establecimiento;
use Faker\Generator as Faker;

$factory->define(Establecimiento::class, function (Faker $faker) {
    return [
        'nombre_establecimiento' => $faker->company(),
        'descripcion_establecimiento' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'dirección_establecimiento' => $faker->address(),
        'num_telefono' => 953600478,
        'latitud' => $faker->latitude($min = -90, $max = 90),
        'longitud' => $faker->longitude($min = -180, $max = 180),
        'tipo_establecimiento' => $faker->randomElement([Establecimiento::TIPO_ESTABL_1,
                                Establecimiento::TIPO_ESTABL_2, Establecimiento::TIPO_ESTABL_3]),
        'nif' => 'J29746401',
        'maximo_numero_comensales' => 80,
        'aforo' => 100,
        //'puntuacion_media_establecimiento' => 10,
        'user_id' => User::all()->random()->id, //solo aquellos que sean de tipo propietarios
        'es_premium' => $faker->randomElement([0, 1]),
    ];
});
