<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'client.name'      =>['required'],
            'client.fone'      =>['required'],
            'address.zip_code' =>['required'],
            'address.city'     =>['required'],
            'address.uf'       =>['required'],
            'address.district' =>['required'],
            'address.street'  =>['required'],
            'address.number'   =>['required'],
            // 'machine.brand'         =>['required'],
            // 'machine.model'         =>['required'],
            // 'machine.serial_number' =>['required'],
            // 'machine.machine_type'  =>['required'],
            // 'machine.description'   =>['required'],
            // 'machine.breakdowns'    =>['required'],

        ];        
    }

    public function attributes()
    {
        return [
            'client.name'     =>'nome',
            'client.fone'     =>'telefone',
            'address.zip_code' =>'cep',
            'address.city'     =>'cidade',
            'address.uf'       =>'UF',
            'address.district' =>'bairro',
            'address.streest'  =>'logradouro',
            'address.number'   =>'número',
            // 'machine.brand'         =>'marca',
            // 'machine.model'         =>'modelo',
            // 'machine.serial_number' =>'número de série',
            // 'machine.machine_type'  =>'tipo',
            // 'machine.description'   =>'descrição',
            // 'machine.breakdowns'    =>'avarias',
        ];
    }
    
    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório.'
        ];
    }
}
