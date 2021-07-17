<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        return  [
            'nome' => 'required|max:35|unique:clientes',
            'idade' => 'required',
            'email' => 'required|email',
            'endereco' => 'required|min:5'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.max' => 'Nome deve ter no máximo 35 caracteres',
            'nome.unique' => 'Este nome já existe em nossa base de dados',
            'email.email' => 'Favor inserir um email válido',
            'endereco.min' => 'Endereço deve ter no mínimo 5 caracteres',
        ];
    }
}
