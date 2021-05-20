<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{

    const CLIENTE = 'cliente';
    const PROPIETARIO = 'propietario';
    
    protected $table = 'tipo_usuarios'; 

    //Campos rellenables
    protected $fillable = [
        'tipo',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**RELACIONES ENTRE TABLAS */

    //Relacionamos un tipo de usuario con un usuario en concreto
    public function usuarios_tipo()
    {
        return $this->hasMany('App\UsuarioTipo');
    }
}
