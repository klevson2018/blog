<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
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
        'datanasc'    => 'required',
        'nome'        => 'required|min:3|max:100',
        'endereco'    =>'required',
        'bairro'      =>'required',
        'municipio'   =>'required',   
        'sexo'        =>'required',
        'CNS'         =>'required|numeric'    
    
        ];
    }
    public function messages() {
        return [
           'CNS.numeric' => 'CNS Inválido',
           'nome.required' => 'O campo nome é de preenchimento obrigatório',
           'nome.min' => 'O campo nome tem que conter pelo menos 3 letras', 
           'datanasc.required' => 'O campo Data de Nascimento é de preenchimento Obrigatório',           
           'endereco.required' => 'O campo endereco é de preenchimento obrigatório',
           'bairro.required' => 'O campo bairro é de preenchimento obrigatório',
           'municipio.required' => 'O campo municipio é de preenchimento obrigatório',
           'sexo.required'    => 'O Campo Sexo é de Preenchimento Obrigatório!'
        ];
    }
}
