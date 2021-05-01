<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioTipo extends Model
{
    //Campos rellenables
    protected $fillable = [
        'user_id', 'tipo_usuario_id',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
