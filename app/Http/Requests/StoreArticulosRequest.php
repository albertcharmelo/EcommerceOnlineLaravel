<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticulosRequest extends FormRequest
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
            'referencia' => 'numeric|unique:productos,referencia',
            'categoria_id' => 'required',
            'nombre' => 'required|max:50',
            'descripcion' => 'required|min:1',
            'atributo' => 'required|min:1',
            'stock' => 'required|min:0|numeric',
            'precio' => 'required|numeric',
            'tipo_unidad' => 'required|numeric|min:1|max:9',
            'garantia' => 'required|numeric|min:0',
            'estado' => 'required',
            'atributo' => 'required|string'

        ];
    }
}
