<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OsRequest extends FormRequest
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
        'service_id' =>'required',        
        'status'     =>'required',
        'machines_id'=>'required',
        // 'user_id'    =>'required',
        // 'client_id'  =>'required',
        ];
    }

    public function attributes()
    {
        return [
            'service_id'  =>'serviço',
            'status'      =>'status',
            'machines_id' =>'computador',
            // 'user_id'     =>'Usuário',
            // 'client_id'   =>'cliente',
        ];
    }

    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório.'
        ];
    }
}
