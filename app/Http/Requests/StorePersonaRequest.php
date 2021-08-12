<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
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
        'nombre' => 'required|min:5|max:60',
        'tipo_documento_id'=> 'required',
        'num_documento'=> 'required',
        'direccion'=> 'required',
        'telefono'=> 'required',
        'email'=> 'required',        
        ];
    }
    // public function attributes()
    // {
    // return [
    //     'nombre' => 'Nombre del Proveedor',
    //     'tipo_documento' => 'Tipo de Documento',
    //     'num_documento' => 'Número de Documento',
    //     'direccion'=> 'Dirección',
    //     'telefono'=> 'Telefono',
    //     'email'=> 'Email',
    // ];
    // }
}
