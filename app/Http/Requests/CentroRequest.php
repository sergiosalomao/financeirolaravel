<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           
            'descricao' => 'required|unique:centros',
            'status' => 'required',
          
            

        ];
    }

    public function messages()
    {
        return [
           
            'descricao.unique' => 'Este Centro já existe.',
            'descricao.required' => 'Campo Obrigatorio.',
            'status.required' => 'Campo obrigatório',
            
        ];
    }
}
