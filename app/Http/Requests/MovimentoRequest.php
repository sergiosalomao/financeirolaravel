<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentoRequest extends FormRequest
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
            'data' => 'required',
          
            'conta_id' => 'required',
            'centro_id' => 'required',
            'fluxo_id' => 'required',
            'descricao' => 'required',
          
            'valor' => 'required',
            

        ];
    }

    public function messages()
    {
        return [
            'data.required' => 'Informe a data do movimento.',
          
         
            'conta_id.required' => 'Informe qual a conta do lançamento.',
            'centro_id.required' => 'Informe qual a o centro de custo do lançamento.',
            'fluxo_id.required' => 'Informe qual a o fluxo do lançamento.',
            'descricao.required' => 'Descricao é obrigatoria',
         
            'valor.required' => 'Informe o valor',
           
        ];
    }
}
