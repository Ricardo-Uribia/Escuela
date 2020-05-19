<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CicloFormRequest extends FormRequest
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
            'inicial' => 'required|numeric',
            'final' => 'required|numeric',
            'periodo' => 'required',
            'descripcion' => 'max:255',
            'codigoCorto' => 'required|max:50|min:5',
            'fechaInicial' => 'required|date',
            'fechaFinal' => 'required|date',
        ];
    }
}
