<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proveedorRequest extends FormRequest
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
        return [
            'nombre' => 'required|string|min:0'
            , 'codigopostal' => 'required|numeric|min:3|max:6'
            , 'direccion' => 'required|string|min:0|max:2000'
            , 'telefono' => 'required|numeric|min:0|max:12'
            , 'email' => 'required|string|min:0|max:100'
        ];
    }
    public function messages()
    {
    return [
        'nombre.required' => 'nombre debe ser un campo requerido',
        'codigopostal.required' => 'La codigopostal debe ser un campo requerido',
        'codigopostal.min' => 'La codigopostal debe tener minimo tres caracteres',
        'codigopostal.max' => 'La codigopostal debe tener maximo 6 caracteres',
        'direccion.required' => 'La direccion debe ser un campo requerido',
        'telefono.required' => 'El telefono debe ser un campo requerido',
        'telefono.min' => 'El telefono debe tener minimo un caracter',
        'telefono.max' => 'El telefono debe tener maximo 12 caracteres',
        'email.required' => 'El email debe ser un campo requerido',
        ];
    }
}
