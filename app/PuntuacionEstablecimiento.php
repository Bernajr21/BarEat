<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntuacionEstablecimiento extends Model
{
    //Campos rellenables
    protected $fillable = [
        'user_id','establecimiento_id', 'puntuacion_establecimiento', 'comentario',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
