<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;

class UserResource extends BaseResource
{
    public function generateLinks($request)
    {
        return [
            [
                'rel' => 'self',
                'href' => route('usuarios.show', $this->id),
            ],
            [
                'rel' => 'usuarios.tipos',
                'href' => route('usuarios.tipos.index', $this->id),
            ],
            /*[
                'rel' => 'usuario.establecimiento.reserva',
                'href' => route('usuario.establecimiento.reserva.index', $this->id),
            ],*/
            /*[
                'rel' => 'self',
                'href' => route('usuarios.show', $this->id),
            ],
            [
                'rel' => 'self',
                'href' => route('usuarios.show', $this->id),
            ],*/
        ];
    }
}
