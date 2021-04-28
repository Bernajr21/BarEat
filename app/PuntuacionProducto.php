<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntuacionProducto extends Model
{
    //Campos rellenables
    protected $fillable = [
        'user_id','producto_id', 'puntuacion_producto', 'comentario',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
