<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ventaRequest extends FormRequest
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
            'usuario_id' => 'required|integer|min:0'
            ,'producto_id' => 'required|integer|min:0'
            , 'fecha' => 'required|string|min:0|max:20'
            , 'monto' => 'required|numeric|min:0|max:3000'
            , 'estado_pago' => 'required|string|min:0|max:100'
        ];
    }

    public function messages()
    {
    return [
        'usuario_id.required' => 'usuario_id debe ser un campo requerido',
        'fecha.required' => 'La fecha debe ser un campo requerido',
        'monto.required' => 'El monto debe ser un campo requerido',
        'monto.min' => 'El monto debe tener minimo un caracter',
        'monto.max' => 'El monto debe tener maximo 5 caracteres',
        'estado_pago.required' => 'El estado_pago debe ser un campo requerido',
        ];
    }
}
