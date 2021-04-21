<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    //Campos rellenables
    protected $fillable = [
        'nombre_establecimiento', 'descripcion_establecimiento', 'dirección_establecimiento',
        'latitud', 'longitud', 'tipo_establecimiento', 'maximo_numero_comensales', 'aforo',
        'puntuacion_media_establecimiento', 'ruta_foto_principal','nif', 'es_premium',
    ];

    //Campos ocultos
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //Obtenemos las reservas realizadas en este establecimiento
    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }

    public function productos_carta(){
        return $this->hasOneThrough('App\Producto', 'App\Carta');
    }

    public function puntuaciones_establecimiento(){
        return $this->hasMany('App\Puntuacion_establecimiento');

    }

    public function imagenes(){
        return $this->hasMany('App\Imagenes');
    }

    public function pagos(){
        return $this->hasMany('App\Pago');
    }

    public function anuncios(){
        return $this->hasMany('App\Anuncio');
    }
}
