<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class RecepcaoFormRequest extends FormRequest
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
        'paciente_id' =>'required',
        'descricao'   =>'required|min:10',    
        'urgencia'    =>'required', 
        'dataent'     =>'required'
    
        ];
    }
    public function messages() {
        return [
            
           'paciente_id.required' => 'O campo nome é de preenchimento obrigatório',
           'descricao.min' => 'O campo descricão tem que conter pelo menos 3 letras', 
           'dataent.required' => 'O campo Data de Entrega é de preenchimento Obrigatório',           
           'urgencia.required' => 'O campo Urgencia é de preenchimento obrigatório',
        ];
    }
}
