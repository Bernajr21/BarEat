<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UsuarioTipo extends Model
{
    //Campos rellenables
    protected $fillable = [
        'tipo_usuario_id', 'user_id',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
