<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storenomina extends FormRequest
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
            'empleado_id' => 'required',
            'file' => 'required',
            'valor' => 'required',
            'Fecha' => 'required',
            
            'retenciones' => 'required',
            /* 
            'IVA' => 'required',
            'Fecha' => 'required',
            
            'file' => 'required',
            'denominacíon' => 'required',
            'direccion' => 'required', */
        ];
    }
    public function attributes()
{
    return [
        'valor' => 'Salario',
        

    ];}
}
