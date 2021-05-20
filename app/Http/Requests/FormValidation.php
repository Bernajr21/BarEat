<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd(request()->all());
        return [

            //Establecimiento
            'nombre_establecimiento' => 'required',
            'descripcion_establecimiento' => 'required',
            'direccion_establecimiento' => 'required',
            /*'num_telefono' => 'required|unique:establecimientos|integer', //RegExp para formato telf (móvil o fijo?)
            'email' => 'required|unique:establecimientos|email',
            'tipo_establecimiento' => 'required',
            //'nif' => 'required', //RegExp para formato NIF

            //Establecimiento productos
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'precio_producto' => 'required',
            'tipo_producto'=> 'required',
            

            //Usuario
            'name'=> 'required',
            'apellidos'=> 'required',
            'password'=> 'required',*/
    
        ];
    }

    public function messages()
    {
        return [

            'nombre_establecimiento.required' => 'El :attribute es obligatorio.',
            'descripcion_establecimiento.required' => 'La :attribute es obligatorio.',
            'direccion_establecimiento.required' => 'La :attribute es obligatorio.',
    
            'num_telefono.required' => 'El :attribute es obligatorio.',
            'num_telefono.integer' => 'El :attribute debe ser un número de teléfono válido.',
            'num_telefono.unique' => 'El :attribute ya existe.',

            'email.required' => 'El :attribute es obligatorio.',
            'email.unique' => 'El :attribute ya está registrado.',
            'email.email' => 'El :attribute debe tener formato email válido.',
    
            'nombre_producto.required' => 'El :attribute es obligatorio.',
            'descripcion_producto.required' => 'La :attribute es obligatorio.',
            'precio_producto.required' => 'El :attribute es obligatorio.',
            'tipo_producto.required' => 'El :attribute es obligatorio.',
            
        ];
    }

    public function attributes()
    {
        return [
            
            'nombre_establecimiento' => 'nombre del establecimiento',
            'descripcion_establecimiento' => 'descripción del establecimiento',
            'direccion_establecimiento' => 'dirección del establecimiento',
            'num_telefono' => 'teléfono de contacto', 
            'email' => 'email',
            'tipo_establecimiento' => 'tipo de establecimiento',

            'nombre_producto' => 'nombre del producto',
            'descripcion_producto' => 'descripción del producto',
            'precio_producto' => 'precio',
            'tipo_producto'=> 'tipo de producto',
        ];
    }
}
