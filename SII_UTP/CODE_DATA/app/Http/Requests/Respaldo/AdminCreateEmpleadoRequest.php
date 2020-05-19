<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateEmpleadoRequest extends FormRequest
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
            'txtPaterno' => 'required|max:100',
            'txtMaterno' => 'required|max:100',
            'nombre' => 'required|max:100',
            'file' => 'nullable|mimes:jpg,jpeg,png'
            'genero' => 'require|max:1',
            'Fecha_nacimiento' => 'require|date',
            'estado_id' => 'require|numeric',
            'town3' => 'require|numeric',
            'estado_id4' => 'require|numeric',
            'town4' => 'require|numeric',
            'email' => 'require|unique:users|email_address',
            'cp' => 'require|max:10|min:10' ,
            'domicilio' => 'nullable|max:10|min:10',
            'estadoCivil' => 'require|max:10|min:10',
            'notas' => 'nullable|max:100|min:10',
            'claveProfe' => 'require|max:10|min:10',
            'numEmpleado' => 'require|max:10|min:10',
            'sueldo' => 'require|numeric',
            'Fecha_ingreso' => 'require|date',
            'Fecha_baja' => 'nullable|date',
            'horasAdmin' => 'require|numeric',
            'horasInves' => 'require|numeric',
            'docencia' => 'require|numeric',
            'departamento' => 'nullable|max:10|min:10',
            'cargo' => 'require|max:10|min:10',
            'telefono' => 'nullable|numeric',
            'celular' => 'nullable|numeric',
            'contrato' => 'require|max:10|min:10',
            'status' => 'require|max:1',
            'nivelEstudio' => 'require|max:10|min:10',
            'titulado' => 'require|max:1',
            'almaMater' => 'require|max:10|min:10',
            'cedula' => 'require|max:10|min:10',
            'especialidad' => 'require|max:10|min:10',
            'numeroSeguro' => 'require|numeric',
            'curp' => 'require|max:10|min:10',
            'rfc' => 'require|max:10|min:10',
        ];
    }
}
