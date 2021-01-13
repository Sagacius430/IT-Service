<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   UserRequest extends FormRequest
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
            'name'        => 'required',
            'second_name' => 'required',
            'fone'        => 'required',
            'email'       => ['required', 'email', 'unique:users', 'confirmed'],            
            'password'    => ['required', 'min:6','max:10', 'confirmed'],
            'role'        => 'required',
        ];
    }

    public function attributes()
    {
        return[
            'name'        => 'nome',
            'second_name' => 'segundo nome',
            'fone'        => 'telefone',
            'email'       => 'e-mail',
            'password'    => 'senha',
        ];
    }

    public function messages()
    {
            return[
                'required' => 'O campo :attribute é obrigatório.',
                'email'    => 'Informe um email válido.',
                'unique'   => 'Já existe um registro com o valor informado em :attribute.',
                'min'      => 'O campo :attribute deve possuir no mínimo :min caractares.',
                'max'      => 'O campo :attribute deve possuir no máximo :max caractares.',
                'confirmed'=> 'A confirmação do campo :attribute não é válido.',
            ];
    }

}
