<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidos', 'email', 'num_telefono', 'fecha_nacimiento', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**RELACIONES ENTRE TABLAS */

    //Relacionamos al usuario con su tipo de usuario
    public function usuarios_tipo()
    {
        return $this->belongsToMany('App\UsuarioTipo', 'usuario_tipos');
    }

    //Relacionamos la tabla usuarios con la tabla establecimientos
    public function establecimientos()
    {
        return $this->hasMany('App\Establecimiento');
    }

    //Relacionamos la tabla usuarios con la tabla reservas
    public function reserva()
    {
        return $this->hasMany('App\ReservaTipo');
    }

    //Relación usuario - puntuaciones de los establecimientos
    public function puntuacion_establecimientos(){
        return $this->hasMany('App\PuntuacionEstablecimiento');
    }

    //Relación usuario - puntuaciones de los productos
    public function puntuacion_productos(){
        return $this->hasMany('App\PuntuacionProducto');
    }

    //Obtenemos las imágenes del usuario
    public function imagenes(){
        return $this->hasMany('App\Imagenes');
    }
}
