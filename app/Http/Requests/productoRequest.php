<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productoRequest extends FormRequest
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
            'proveedor_id' => 'required|integer|min:0'
            , 'producto' => 'required|string|min:3|max:100'
            , 'marca' => 'required|string|min:0|max:200'
            , 'precio' => 'required|numeric|min:0|max:3000'
            , 'stock' => 'required|numeric|min:0|max:10000'
        ];
    }

    public function messages()
    {
    return [
        'proveedor_id.required' => 'proveedor_id debe ser un campo requerido',
        'producto.min' => 'La producto debe tener minimo tres caracteres',
        'producto.max' => 'La producto debe tener maximo 100 caracteres',
        'marca.required' => 'La marca debe ser un campo requerido',
        'marca.min' => 'La marca debe tener minimo un caracter',
        'marca.max' => 'La marca debe tener maximo 200 caracteres',
        'precio.required' => 'El precio debe ser un campo requerido',
        'precio.min' => 'El precio debe tener minimo un caracter',
        'precio.max' => 'El precio debe tener maximo 5 caracteres',
        'stock.required' => 'El stock debe ser un campo requerido',
        'stock.min' => 'El stock debe tener minimo un caracter',
        'stock.max' => 'El stock debe tener maximo 5 caracteres',
        ];
    }
}
