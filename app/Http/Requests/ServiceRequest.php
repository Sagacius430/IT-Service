<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'type'        => 'required',
            'description' => 'required',
            'value'       => 'required',
            
        ];
    }
    public function attributes()
    {
        return[
            'name'        => 'nome',
            'type'        => 'complexidade',
            'description' => 'descrição',
            'value'       => 'valor',
        ];
    }

    public function messages()
    {
            return[
                'required'    => 'O campo :attribute é obrigatório.',
                'name'        => 'Informe um nome para o serviço.',
                'type'        => 'Informa a complexidade do serviço.',
                'description' => 'Descreva o serviço.',
                'value'       => 'Informe o valor do serviço.',
                
            ];
    }
}
